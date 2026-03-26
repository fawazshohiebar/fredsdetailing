---
id: b4148957-467a-4ae1-8882-7efb101ae0bf
blueprint: page
title: 'Hotel Booking'
page_builder:
  -
    type: set
    attrs:
      id: mn7dcl4g
      values:
        type: heading_comp
        background: bgcolor
        background_color: secondary
        design: centered
        heading:
          -
            type: heading
            attrs:
              level: 2
            content:
              -
                type: text
                marks:
                  -
                    type: bold
                  -
                    type: textColor
                    attrs:
                      color: redgrad
                text: 'Exclusive Hotel Rates Booking'
        description:
          -
            type: paragraph
            content:
              -
                type: text
                text: "We are pleased to share that all ISNR exhibitors and visitors are entitled to an exclusive discount on their stay during the event. We have partnered with a selection of preferred accommodations, carefully chosen for their proximity to the venue to ensure your convenience and comfort.\_"
              -
                type: text
                marks:
                  -
                    type: bold
                text: 'The discount is automatically applied when booking your stay for the event dates.'
          -
            type: paragraph
            content:
              -
                type: text
                text: "For hotels not listed among our partners, you can still enjoy a special offer by using the promo code\_"
              -
                type: text
                marks:
                  -
                    type: bold
                text: ISNR2026
              -
                type: text
                text: "\_when booking through\_"
              -
                type: text
                marks:
                  -
                    type: link
                    attrs:
                      href: 'https://events.tourism365.ae/'
                      rel: null
                      target: _new
                      title: null
                  -
                    type: bold
                text: 'Etihad Holidays'
              -
                type: text
                text: '. Book your stay early to secure this exclusive deal and make the most of your show experience!'
  -
    type: set
    attrs:
      id: mn7ddaf6
      values:
        type: cta_grid
        background: bgcolor
        background_color: secondary
        grid_version: v1
        grid_set_replicator:
          -
            id: mn7ddn6x
            number_of_stars: 5
            grid_heading:
              -
                type: paragraph
                content:
                  -
                    type: text
                    text: 'Andaz Capital Gate Abu Dhabi - A Concept by Hyatt'
            book_button:
              -
                id: mn7ddxu3
                link: 'https://book.etihadholidays.com/package/hotel/united-arab-emirates/abu-dhabi/453/andaz-capital-gate-abu-dhabi-by-hyatt/187951?To=453&DepartureDate=2025-10-19&ReturnDate=2025-10-24&Currency=AED&CultureCode=en-US&RoomCount=1&PaxInfos%5B0%5D.AdultCount=2&HotelCode=187951&ProductId=2688100e-9b5d-423d-846b-abb4d098e2b1&PromoCode=EYHGFW25'
                label: 'Book Now'
                design: blackbgwhitetxt
                icon: none
                open_new_tab: false
                button_size: fit
                type: button_set
                enabled: true
            type: grid_set
            enabled: true
            grid_images: andaz-hotel-jpg-(1).png
          -
            id: mn7der0x
            number_of_stars: 4
            grid_heading:
              -
                type: paragraph
                content:
                  -
                    type: text
                    text: 'Aloft Abu Dhabi'
            book_button:
              -
                id: mn7ddxu3
                link: 'https://book.etihadholidays.com/package/hotel/united-arab-emirates/abu-dhabi/453/aloft-abu-dhabi/148362?To=453&DepartureDate=2025-10-19&ReturnDate=2025-10-24&Currency=AED&CultureCode=en-US&RoomCount=1&PaxInfos%5B0%5D.AdultCount=2&HotelCode=148362&ProductId=2688100e-9b5d-423d-846b-abb4d098e2b1&PromoCode=EYHGFW25'
                label: 'Book Now'
                design: blackbgwhitetxt
                icon: none
                open_new_tab: false
                button_size: fit
                type: button_set
                enabled: true
            type: grid_set
            enabled: true
            grid_images: small.png
          -
            id: mn7df0ot
            number_of_stars: 4
            grid_heading:
              -
                type: paragraph
                content:
                  -
                    type: text
                    text: 'Pearl Rotana Capital Centre'
            book_button:
              -
                id: mn7ddxu3
                link: 'https://book.etihadholidays.com/package/hotel/united-arab-emirates/abu-dhabi/453/pearl-rotana-capital-centre/2667402?To=453&DepartureDate=2025-10-19&ReturnDate=2025-10-24&Currency=AED&CultureCode=en-US&RoomCount=1&PaxInfos%5B0%5D.AdultCount=2&HotelCode=2667402&ProductId=2688100e-9b5d-423d-846b-abb4d098e2b1&PromoCode=EYHGFW25'
                label: 'Book Now'
                design: blackbgwhitetxt
                icon: none
                open_new_tab: false
                button_size: fit
                type: button_set
                enabled: true
            type: grid_set
            enabled: true
            grid_images: small-(1).png
          -
            id: mn7df3br
            number_of_stars: 4
            grid_heading:
              -
                type: paragraph
                content:
                  -
                    type: text
                    text: 'Capital Centre Arjaan By Rotana'
            book_button:
              -
                id: mn7ddxu3
                link: 'https://book.etihadholidays.com/package/hotel/united-arab-emirates/abu-dhabi/453/centro-capital-center/220291?To=453&DepartureDate=2025-10-19&ReturnDate=2025-10-24&Currency=AED&CultureCode=en-US&RoomCount=1&PaxInfos%5B0%5D.AdultCount=2&HotelCode=220291&ProductId=2688100e-9b5d-423d-846b-abb4d098e2b1&PromoCode=EYHGFW25'
                label: 'Book Now'
                design: blackbgwhitetxt
                icon: none
                open_new_tab: false
                button_size: fit
                type: button_set
                enabled: true
            type: grid_set
            enabled: true
            grid_images: small-(2).png
  -
    type: set
    attrs:
      id: mn7dferd
      values:
        type: heading_and_grid
        background: bgcolor
        background_color: secondary
        grid_structure: v3
        design: centered
        heading:
          -
            type: heading
            attrs:
              level: 3
            content:
              -
                type: text
                marks:
                  -
                    type: bold
                  -
                    type: textColor
                    attrs:
                      color: redgrad
                text: 'More enquiries'
        replicating_grid:
          -
            id: mn7dg2ua
            heading: 'For Group Hotel Bookings'
            icon_or_button: iconlist
            icon_list:
              -
                id: mn7dg8jb
                text: muhammad.umar@tourism365.ae
                link: 'mailto:muhammad.umar@tourism365.ae'
                icon: envelope
                type: icon_list_item
                enabled: true
            type: grid_item
            enabled: true
          -
            id: mn7dgrhq
            heading: 'For Transportation, Tours and Visa Requests'
            icon_or_button: iconlist
            icon_list:
              -
                id: mn7dgyoa
                text: events.service@tourism365.ae
                link: 'mailto:events.service@tourism365.ae'
                icon: envelope
                type: icon_list_item
                enabled: true
            type: grid_item
            enabled: true
          -
            id: mn7dhd0h
            heading: 'For Flights'
            icon_or_button: iconlist
            icon_list:
              -
                id: mn7dhl3z
                text: adnec.flights@tourism365.ae
                link: 'mailto:adnec.flights@tourism365.ae'
                icon: envelope
                type: icon_list_item
                enabled: true
            type: grid_item
            enabled: true
          -
            id: mn7di9w0
            heading: 'Individual Hotel Bookings (Discount Code: ISNR2026)'
            icon_or_button: buttonlist
            button_list:
              -
                id: mn7dih1j
                link: 'https://www.etihad.com/en-ae/abu-dhabi/holidays'
                label: 'Click Here'
                design: bluebgwhitetxt
                icon: arrow-right
                open_new_tab: false
                button_size: fit
                type: button_set
                enabled: true
            type: grid_item
            enabled: true
  -
    type: paragraph
    attrs:
      textAlign: left
layout: layout
reusable_popup: false
template: default
fine_seo_is_title_custom: false
header_scripts:
  code: null
  mode: htmlmixed
body_start_scripts:
  code: null
  mode: htmlmixed
body_end_scripts:
  code: null
  mode: htmlmixed
updated_by: ac775259-f1c4-4a12-b768-668149cb0e1a
updated_at: 1774523927
fine_seo_title: 'Hotel Booking'
fine_seo_preview: 'Hotel Booking'
---
