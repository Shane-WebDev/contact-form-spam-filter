# Contact Form Spam Filter #
A lightweight, captcha-free, back-end-email-rule-based-free tool, that filters spam from simple contact forms. 
Ideal for filtering spam in contact form fields such as Names, Emails, and Messages, without any overhead or need to update the the filters.

## Features ##
- Simple contact form that dumps identified spam and results in the same success page being returned to the spammer as a real user would see.
- An updated filter as new spam rolls in, making a simple check for your own contact forms never needing to be updated.
- The Names, Emails, and Messages files, are independent of each others and make a great addition to any filtering systems you may have already set up.
- Option to loop Contact Form emails to a standalone email box for monitoring and adding in new spam here.

## Folders and Files ##
### Blacklists Folder ###
  - names.php | Array of identified spam names
  - emails.php | Array of identified spam email addresses
  - messages.php | Array of identified spam messages/parts thereof
### Contact Form Folder ###
  - contact.php | Simple contact form, with Name, Email, and Message sections
  - success.php | Simple success page after Contact Form is submitted



## Background ##
After setting up a simple contact form with 3 fields, Name, Email, Message, the occassional email would come through in various languages and names, all with the same email address, kayleighbpsteamship@gmail.com and slightly variating names. Replying once to this email address, allowed the floodgates of spam to spring forth, as it appears kayleighbpsteamship@gmail.com was a catch address that would then trigger the bots. 
Notably, the original messages were a variation of one about 30 languages of messages, all with the same type of, "what is your price" message. These original messages included:
LANGUAGE | MESSAGE
| :--- | :---
Afrikaans | Hallo, ek wou jou prys ken.
Albanian | Hi, kam dashur të di çmimin tuaj'
Armenian | Ողջույն, ես ուզում էի իմանալ ձեր գինը.
Azerbaijani | Salam, qiymətinizi bilmək istədim.
Basque | Kaixo, zure prezioa jakin nahi nuen.
Belarusian | Прывітанне, я хацеў даведацца Ваш прайс.
Bengali (Bangla) | হাই, আমি আপনার মূল্য জানতে চেয়েছিলাম.
Bulgarian | Здравейте, исках да знам цената ви.
Catalan | Hola, volia saber el seu preu.
Croatian (Serbian / Latin Script) | Zdravo, htio sam znati vašu cijenu.
Danish | Hej, jeg ønskede at kende din pris.
English | Hi, I wanted to know your price.
Galacian | Ola, quería saber o seu prezo.
Georgian | Hi, მინდოდა ვიცოდე თქვენი ფასი.
Greek | Γεια σου, ήθελα να μάθω την τιμή σας.
Hawaiian | Aloha, makemake wau eʻike i kāu kumukūʻai.
Hungarian | Szia, meg akartam tudni az árát.
Icelandic | Hæ, ég vildi vita verð þitt.
Igbo | Ndewo, achọrọ m ịmara ọnụahịa gị.
Indonesian | Hai, saya ingin tahu harga Anda.
Irish (Gaeilge) | Dia duit, theastaigh uaim do phraghas a fháil.
Italian | Ciao, volevo sapere il tuo prezzo.
Latin | Hi, ego volo scire vestri pretium.
Latvian | Sveiki, es gribēju zināt savu cenu.
Lithuanian | Sveiki, aš norėjau sužinoti jūsų kainą.
Luxembourgish | Salut, ech wollt Äre Präis wëssen.
Spanish | Hola, quería saber tu precio.
Vietnamese | Xin chào, tôi muốn biết giá của bạn.
Welsh | Hi, roeddwn i eisiau gwybod eich pris.
Zulu | Sawubona, bengifuna ukwazi intengo yakho.


## Potential Issues ##
This simple filter in no way results in an ideal world, where perhaps one real user has similar details and has filled out the contact form genuinely. For that reason, it should be noted that if you simply wish to filter just names, you may wind up with real people unable to conact you, but thinking they have. The same applies for messages. Many spam Messaages offer some kind of service, and for that reason have similar phrasing that would often not be used by a genuine user. Therefore, more often than not, certain phrases or terms in Messages have been selected to help filter out messages without the check running through a full array of complex messages. Sometimes these are even just single terms, which might be worth adding in as a filtered terms.php at a later date. The same future update would be viable for splitting emails into their name and domain parts, then only blacklisting domains that were known spam, making the search quicker.

For those reasons, if you are going to use these files individually in your project, I would recommend a minimum of two files be checked, and if both result in a positive, then a dump of the spam can procedd, otherwise it may result in a false-positive.

### Formatting ###
While not needed, the decision to standardize email addresses was made. 
WHAT ARRIVED | AFTER STANDARDIZATION
| :--- | :---
tapdils@msn.com | tapdils@msn.com
terryb@TCTRANS.COM | terryb@tctrans.com
TMCWATERS@MEDCENTRAL.ORG | tmcwaters@medcentral.org

## Updates ##
As new spam will inevitably find it's way around the filter, be it via using a new name, email, or message, the new data will be collected and added into the corresponding files.

Down the track, there is a potential to expand this contact form into a full blown PHP solution, including honeypots and customization options. However, for now, let's see how this project ventures.
