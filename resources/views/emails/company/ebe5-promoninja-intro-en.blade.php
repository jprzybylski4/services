

@component('mail::message')
 
# Hi {{$profile->translate("[[fname]]")}},

**We have enabled a challenge / competition in your exhibitor's account**

What's the idea behind it?

@component('mail::panel')

Some of our premium services are available only for Exhibitors that are promoting their participation in the Expo. 

We believe that a successful event is not only getting to know new customers, but also strengthening relationships with existing clients.

The market value of the services we put to the challenge is higher that 25 000 EUR.

@endcomponent

You can win points by sharing a customized link which promotes your participation in the expo. Every click equals one point. 

Please find your customized link below. Use it when creating newsletters, email footers, advertisement (fb ads, adwords, social media) or when directly informing your clients.


@component('mail::panel')
[{{ $trackingLink }}]({{ $trackingLink }}) 
@endcomponent


**  IMPORTANT: The competition will be enabled till 4th February 11:59 PM CET**

# In your Exhibitor's account you will find 4 important sections related to the Challenge.

@component('mail::button', ['url' => $accountUrl])
Sign In
@endcomponent

# RANKING

The ranking is created on the basis of data fetched from our google analytics.

When you check the results early in the morning, you may see the results from the previous day.

## REWARDS

Each of the prizes requires fulfillment of the conditions for its granting.

* minimal number of points (= pageviews of your public exhibitor's profile)
* position in the ranking

Looking at every listed prize you can see whether your company meets the conditions or not. Please remember that everything may change till the end of the Challenge so it is recommended not to open the champagne until the end of the competition.

## EMAIL TEMPLATES

2 ready-to-send newsletters (english and german), which are designed to inform your clients and partners about your participation in the event. You can copy HTML or download a zip file that can be easily imported by Newsletter2go / Mailchimp-like software.

## PROMOTIONAL MATERIALS

3 separate links, which you can share with different visual results

* your logotype on our background
* custom design (you will need to give full URL to your design in Company Data)

** Every link can be copied to clipboard, sent via messenger / @ or used in your designed-from-scratch newsletters.**

@component('mail::button', ['url' => $accountUrl])
Sign In  
@endcomponent

# Some of the PRIZES

## Exclusive branded visitor badges

Exclusive branded visitor badges with the Winner's logo. The badges will be handed out to all of the visitors (7000+) during the E-commerce Berlin Expo 2020.

## Presentation slot on one of our stages

30-minute presentation slot during upcoming expo. Your presentation will be added to the official agenda and promoted. 

## VIDEO interview

Your company will be video-interviewed at your booth during Expo! You will own the resulting material and also can expect we will promote it after the event. 

## Promotion of the company logo on our website

Your logotype will be promoted during next 11 months - till the next event.

## Want to use your own promo materials? Great. Always use the provided link!

## Every click through your customized link to the E-commerce Berlin Expo website gives you one point. 

We are counting only unique clicks on your customized link. Registration at the event website is NOT required to get a point. 

@component('mail::panel')
[{{ $trackingLink }}]({{ $trackingLink }}) 
@endcomponent

Regards, 

{{$footer}}

@endcomponent

