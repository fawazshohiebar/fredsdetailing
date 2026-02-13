---
id: f294db8f-87ee-4e29-9a7e-80cdb0678aa0
origin: 38daf340-86e2-4d56-8408-b2abce79f7db
page_builder:
  -
    type: set
    attrs:
      id: mlkwauhq
      values:
        type: script_block
        script_position: Head
        available_on:
          - Production
        html_block:
          code: |-
            <!-- 
            Start of global snippet: Please do not remove
            Place this snippet between the <head> and </head> tags on every page of your site.
            -->
            <!-- Google tag (gtag.js) -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=DC-10089018"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'DC-10089018');
            </script>
            <!-- End of global snippet: Please do not remove --> 

            <!--
            Event snippet for UAE_ADNEC-MIITE_LEAD-FORM (GT) on : Please do not remove.
            Place this snippet on pages with events you’re tracking. 
            Creation date: 02/12/2026
            -->
            <script>
              gtag('event', 'conversion', {
                'allow_custom_scripts': true,
                'u2': '[URL_Info]',
                'send_to': 'DC-10089018/invmedia/uae_a00d+standard'
              });
            </script>
            <noscript>
            <img src="https://ad.doubleclick.net/ddm/activity/src=10089018;type=invmedia;cat=uae_a00d;u2=[URL_Info];dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;gdpr=${GDPR};gdpr_consent=${GDPR_CONSENT_755};ord=1?" width="1" height="1" alt=""/>
            </noscript>
            <!-- End of event snippet: Please do not remove -->
          mode: htmlmixed
  -
    type: set
    attrs:
      id: mknrseaj
      values:
        type: form
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
                text: 'Enquire to Exhibit at the 2026 Edition'
        form: enquire_to_exhibit_at_the_2026_edition
        show_labels: true
  -
    type: paragraph
    attrs:
      textAlign: left
updated_by: ac775259-f1c4-4a12-b768-668149cb0e1a
updated_at: 1770987631
---
