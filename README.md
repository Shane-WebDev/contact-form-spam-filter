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
After setting up a simple contact form with 3 simple fields, Name, Email, Message, the occassional email would come through in various languages and names, all with the same email address:
kayleighbpsteamship@gmail.com
Replying once to this email address, allowed the floodgates of spam to spring forth, with 
These dothat are added to as new form spam is found. 


Updated as new emails come in Ideal for binning educational purposes, quick data cleaning, or as a starting point for more complex data analysis projects. Includes basic examples and customizable filters.
