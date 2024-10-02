# Contact Form Spam Filter #
A lightweight, captcha-free, back-end free tool, that filters spam from simple contact forms. 
Ideal for filtering spam in form fields such as Names, Emails, and Messages, without any overhead or need to update the the filters.

## Features ##
- Simple contact form that dumps identified spam and results in the same success page being returned to the spammer as a real user would see.
- An updated filter as new spam rolls in, making a simple check for your own contact forms never needing to be updated.
- The Names, Emails, and Messages files, are independent of each others and make a great addition to any filtering systems you may have already set up.
- Option to loop all emails 

## Folders and Files ##
### Include 3 primary filter documents: ###
  - names.php | Array of identified spam names
  - emails.php | Array of identified spam email addresses
  - messages.php | Array of identified spam messages/parts thereof
### A contact form ###
  - contact.php | Simple contact form, with Name, Email, and Message sections
  - success.php | Simple success page after Contact Form is submitted



## Background ##
After setting up a simple contact form with 3 fields, Name, Email, Message, the occassional email would come through in various languages and names, all with the same email address, kayleighbpsteamship@gmail.com and slightly variating names. Replying once to this email address, allowed the floodgates of spam to spring forth, as it appears kayleighbpsteamship@gmail.com was a catch address that would then trigger the bots. 
Notably, the original messages were a variation of one about 30 languages of messages, all with the same type of, "what is your price" message. These original messages included:
Language | Message
---------|---------
Hawaiian | Aloha, makemake wau eʻike i kāu kumukūʻai.
Italian | Ciao, volevo sapere il tuo prezzo.
Dia duit, theastaigh uaim do phraghas a fháil.
Hai, saya ingin tahu harga Anda.
Hallo, ek wou jou prys ken.
Hej, jeg ønskede at kende din pris.
Hi, ego volo scire vestri pretium.
Hi, I wanted to know your price.
Hi, kam dashur të di çmimin tuaj'
Hi, roeddwn i eisiau gwybod eich pris.
Hi, მინდოდა ვიცოდე თქვენი ფასი.
Hola, quería saber tu precio.
Hola, volia saber el seu preu.
Hæ, ég vildi vita verð þitt.
Kaixo, zure prezioa jakin nahi nuen.
Ndewo, achọrọ m ịmara ọnụahịa gị.
Ola, quería saber o seu prezo.
Salam, qiymətinizi bilmək istədim.
Salut, ech wollt Äre Präis wëssen.
Sawubona, bengifuna ukwazi intengo yakho.
Sveiki, aš norėjau sužinoti jūsų kainą.
Sveiki, es gribēju zināt savu cenu.
Szia, meg akartam tudni az árát.
Xin chào, tôi muốn biết giá của bạn.
Zdravo, htio sam znati vašu cijenu.
Γεια σου, ήθελα να μάθω την τιμή σας.
Здравейте, исках да знам цената ви.
Прывітанне, я хацеў даведацца Ваш прайс.
Ողջույն, ես ուզում էի իմանալ ձեր գինը.
হাই, আমি আপনার মূল্য জানতে চেয়েছিলাম.


These dothat are added to as new form spam is found.

## Potential Issues ##
This simple filter in no way results in an ideal world, where perhaps one real user has similar details and has filled out the contact form genuinely. For that reason, it should be noted that if you simply wish to filter just names, you may wind up with real people unable to conact you, but thinking they have. The same applies for messages. Many spam Messaages offer some kind of service, and for that reason have similar phrasing that would often not be used by a genuine user. Therefore, more often than not, certain phrases or terms in Messages have been selected to help filter out messages without the check running through a full array of complex messages. Sometimes these are even just single terms, which might be worth adding in as a filtered terms.php at a later date. The same future update would be viable for splitting emails into their name and domain parts, then only blacklisting domains that were known spam, making the search quicker.

For those reasons, if you are going to use these files individually in your project, I would recommend a minimum of two files be checked, and if both result in a positive, then a dump of the spam can procedd, otherwise it may result in a false-positive.

## Updates ##
As new spam will inevitably find it's way around the filter, be it via using a new name, email, or message, the new data will be collected and added into the corresponding files.

Down the track, there is a potential to expand this contact form into a full blown PHP solution, including honeypots and customization options. However, for now, let's see how this project ventures.
