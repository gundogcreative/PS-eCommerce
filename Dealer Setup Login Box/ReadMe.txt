***************************************************************

           Alarm.com Dealer Login Setup ReadMe.txt
                       
***************************************************************

* Please find attached files
   1. form_elements.txt 
   2. Javascript_in_loginpage.txt
   3. login.htm

* Implementation Instructions 

   1. Copy the login form from form_elements.txt and paste it to
      the place where you want to show alarm.com login / password boxes.
   2. Append Javascript code (in Javascript_in_loginpage.txt) to above
      login page.
   3. Assign your own login/logout URL in form's hidden input name="loginFolder". 
      (See setting detail below.)
   4. Error message will be shown in <div id="divAlarmMessage"><div>. You can move this 
      <div></div> section to where the error message to be shown. You can adjust font 
      size (in style attribute) or change error message if needed.           
   6. See sample login page on login.htm



*************************************************************
		form_elements.txt 
*************************************************************
 This file contains the login form and field names being used on your login page.
 Remarks: 
   - Form elememts may invoke Javascript on certain events, i.e. onSubmit, onClick, 
     which is necessary and cannot be skipped to have login process work.
   - Please also append Javascript code (in Javascript_in_loginpage.txt) to login page.
   - In order to make all scripts work properly, please keep form and element IDs/names unchanged.

 

 !!! Implementation

   1. Please keep the form id "loginForm". 
   2. Please remain form action method to POST. 
   3. Please remain all input element’s name without modification. 
   4. Remember Me
   5. The hidden field "loginFolder" is to indicate the redirecting URL after
      user log out. (Usually it's the same as Login URL).  
       <input type="hidden" name="loginFolder" 
                value="http://www.mycompany.com/customerlogin/index.asp"> 

      e.g. If your login page URL is http://www.xyz.com/login.htm then the loginFolder setting will be
             <input type="hidden" name="loginFolder" 
                value="http://www.xyz.com/login.htm"> 
 

*************************************************************
		Javascript_in_loginpage.txt
*************************************************************
 This file contains the Javascript being used by the loginForm above. 
 If you have your own Javascript on the page, please make sure there is 
 no conflict on variable and function names. 


