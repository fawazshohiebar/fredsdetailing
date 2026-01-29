# Agenda API Call Optimization Fix

## Problem
The agenda component was making **thousands of unnecessary API calls**, especially on mobile and when search wasn't being used. This was caused by:

1. **Infinite loop in `filterSessions()`**: The function called `loadAllProgramsAllDays()` which in turn called `filterSessions()` again
2. **Reactive watchers causing repeated calls**: `$watch` on `selectedProgram` and `selectedDay` triggered `loadSessions()` on every change
3. **Window resize listener**: Called `loadSessions()` on every resize event
4. **Search triggering full data loads**: Every search keystroke was loading all programs across all days
5. **Console logs in production**: Debug logs were spamming the console

## Solution

### 1. Removed Reactive Watchers (`$watch`)
**Before:**
```javascript
this.$watch('selectedProgram', () => {
    this.loadSessions();
});

this.$watch('selectedDay', () => {
    this.loadSessions();
});

window.addEventListener('resize', () => {
    this.loadSessions();
});
```

**After:**
```javascript
init() {
    this.generateDays();
    this.programSchedules = new Array(this.programs.length).fill([]);
    this.checkForSharedSession();
    this.loadSessions(); // Only on initialization
}
```

### 2. Manual Triggers on User Actions
Instead of watching for changes, we now explicitly call `loadSessions()` only when the user clicks:

**Day Selector** (`day_selector.antlers.html`):
```html
@click="selectedDay = day.number; searchQuery = ''; loadSessions();"
```

**Program Selector** (`program_selector.antlers.html`) - Only on mobile:
```html
@click="selectedProgram = index; if (window.innerWidth < 1024) { searchQuery = ''; loadSessions(); }"
```

### 3. Fixed Infinite Loop in `filterSessions()`
**Before:**
```javascript
filterSessions() {
    if (this.allDaysData.length === 0) {
        this.loadAllProgramsAllDays(); // This called filterSessions() again!
        return;
    }
    // ... rest of filtering
    this.filterSessions(); // Called at the end of loadAllProgramsAllDays()
}
```

**After:**
```javascript
filterSessions() {
    const query = this.searchQuery.toLowerCase().trim();

    if (!query) {
        // Clear data when not searching
        this.filteredSchedule = this.schedule;
        this.filteredProgramSchedules = this.programSchedules;
        this.allDaysData = []; // Free up memory
        return;
    }

    // Only load all days data once when starting search
    if (this.allDaysData.length === 0) {
        this.loadAllProgramsAllDays(); // No recursive call
        return;
    }

    // Filter the already loaded data
    // ...
}
```

### 4. Optimized `loadSessions()`
**Before:**
```javascript
async loadSessions() {
    if (isMobile) {
        await this.loadProgramSessions(this.selectedProgram);
        if (this.searchQuery.trim()) {
            await this.loadAllProgramsAllDays(); // Extra calls
        }
    } else {
        await this.loadAllProgramsSessions();
        if (this.searchQuery.trim()) {
            await this.loadAllProgramsAllDays(); // Extra calls
        }
    }
}
```

**After:**
```javascript
async loadSessions() {
    if (isMobile) {
        // Only load selected program on mobile
        await this.loadProgramSessions(this.selectedProgram);
    } else {
        // Load all programs on desktop
        await this.loadAllProgramsSessions();
    }
    // Search data loads only when user types, not on every load
}
```

### 5. Removed Unnecessary Calls to `filterSessions()`
- Removed from `loadProgramSessions()`
- Removed from `loadAllProgramsSessions()`
- Only called manually when user types in search

### 6. Added Debouncing to Search Input
**Before:**
```html
<input x-model="searchQuery" @input="filterSessions()" />
```

**After:**
```html
<input x-model="searchQuery" @input.debounce.300ms="filterSessions()" />
```
This waits 300ms after user stops typing before filtering.

### 7. Removed Debug Console Logs
Removed these lines from `loadProgramSessions()`:
```javascript
console.log('Sessions data:', sessions);
console.log('First session share_url:', sessions.length > 0 ? sessions[0].share_url : 'No sessions');
```

### 8. Optimized Search Clear Button
**Before:**
```html
@click="searchQuery = ''; filterSessions();"
```

**After:**
```html
@click="searchQuery = ''; allDaysData = []; filteredSchedule = schedule; filteredProgramSchedules = programSchedules;"
```
Directly resets the state without triggering function calls.

## Result

### API Calls Now Only Happen:
✅ **On page load** - Once
✅ **When user clicks a different day** - Once per day change
✅ **When user clicks a different program** (mobile only) - Once per program change
✅ **When user searches** (first time only) - Loads all data once, then filters locally

### API Calls NO LONGER Happen:
❌ On window resize
❌ On every keystroke while searching
❌ On reactive property changes
❌ In infinite loops
❌ When clearing search

## Testing
1. Open browser DevTools Network tab
2. Navigate to agenda page
3. Verify only initial API calls are made
4. Change days - should see one API call per day change
5. Change programs (mobile) - should see one API call per program change
6. Type in search - should see API calls only once when first searching
7. Clear search - should see NO new API calls
8. Resize window - should see NO API calls

## Files Modified
- `/resources/views/partials/sets/agenda_component.antlers.html` - Main component
- `/resources/views/partials/agenda/day_selector.antlers.html` - Day selector
- `/resources/views/partials/agenda/program_selector.antlers.html` - Program selector
- `/resources/views/agenda.antlers.html` - Deprecated file (also fixed)
