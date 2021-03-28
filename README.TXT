FIRST OF ALL LINK THE XAMPP SERVER 
FOR THIS IN EVERY PHP AND HTML FILE 
IN THE FOLLOWING FIELDS ENTER  
		$servername="(YOUR XAMPP SERVER FOR EXAMPLE 127.0.0.1 OR localhost)";
		$username="(server name by default it is root)";
		$password="(password you kept for the xampp server )";
		$dbname="(name of database where the sql tables are stored for the project)";

Here i have set these above field as follows according to my configurations :

				$servername="127.0.0.1";
				$username="root";
				$password="";
				$dbname="project";

Here project is the database where all the tables are created and stored.



The database table is to be created first manually on the myphpadmin in the xampp server.

To run this project on the xampp server we have to save this project folder in the htdocs folder in the directory folder of the xampp.

Then on the web browser search bar type 
		"localhost/Project/index1.html" 

Here Project is the folder name where all the files are stored related to the project.

Here we have used two css style sheets one for index.1 by the name of style.css
And all the other files have style1.css file included in them.

But majorly we have used html style tag for applying the css styling.

Here we have three categories for login 
	1. admin
	2. student 
	3. company

Admin login :
		
			have all previlages
			can delete student account
			can create student account
			can delete company account
			can create company account
			can handle server side data i.e. database
			can change passwords for accounts

			can see total no. of students registerd on this portal service
			can see total no. of companies refisterd on this portal service
			can see all the job vacancies created by the companies 
			can see totla no. of students that are placed

student login : 
		

			once the student has logged in they will be directed to the student dashoard.
			here they can see their details that they have entered while registering.
			they can see various job vacancies from different companies
			on clicking to one job vanavcy the details of the respective company will be displayed 
			can check the eligibility for the job
			if eligible then they can apply 
			once they have applied the application is transfer to the dashboard of the respective  company
			student can also delete their accounts

Company login :
			

			once the company officials have logged in they will be directed to the Comapny's dashboard 
			here they can see their company's details that they have entered while registering 
			they can create a job vacancy and can delete the same 
			they can also see all the applications for the job vacancy applied by the students
			when they select one application then the details of that student / candidate is displayed for the job vacancy he/she has applied for
			they can accept, reject or keep the status to pending for the application
			they can delete their respective comapny account


Here we have two categories for regiteration process
	1. student 
	2. company
