To integrate Google OAuth authentication for login on your localhost using PHP, you'll need to follow these steps:

Step 1: Set up a project in the Google Developers Console

Go to the Google Developers Console at https://console.developers.google.com/.

Create a new project or select an existing one.

Enable the Google+ API by going to the Library section and searching for "Google+ API". Click on it, and then click the "Enable" button.

Step 2: Create OAuth credentials

In the Google Developers Console, navigate to the "Credentials" section.

Click the "Create credentials" button and select "OAuth client ID".

Select "Web application" as the application type.

Enter a name for your OAuth client.

Under "Authorized JavaScript origins," enter your localhost URL (e.g., http://localhost).

Under "Authorized redirect URIs," enter the callback URL for your authentication process (e.g., http://localhost/callback.php).

Click the "Create" button to generate your OAuth client credentials.

Note down the "Client ID" and "Client Secret" as you'll need them later.

Step 3: download dependencies

download the google-api-php-client-php-version from the github just google this and you will get a github which shows you different version you have to download api client  according to your php version

and make sure to include the file and the complete path of the vendor autoload.php in the code 

Step 4: Implement the login functionality

Create a new PHP file (e.g., index.php) and include the following code

Replace 'YOUR_CLIENT_ID' and 'YOUR_CLIENT_SECRET' with the respective values from your Google Developers Console.

Step 5: Create the callback page

Create a new PHP file (e.g., callback.php) and include the following code:

Replace 'YOUR_CLIENT_ID' and 'YOUR_CLIENT_SECRET' with the respective values from your Google Developers Console.

Step 6: Create the profile page

Create a new PHP file (e.g., profile.php) to display the user's profile information after successful authentication. 

Create a logout.php file with the following code to handle user logout

Now, when you access the index.php file in your browser, you'll see a "Sign in with Google" button. Clicking on it will initiate the OAuth authentication process, and upon successful login,
 the user will be redirected to the profile.php page displaying their information.

Note:Remember to keep your client ID and secret secure and not to expose them publicly in your code.

step 1 : create mysql table

create a database .
Create a MySQL table to store user information:

With this table structure, we'll store the Google user ID, name, and email for each authenticated user.

In your PHP code, after retrieving the user information from Google, you can insert it into the database using the following code snippet:

Make sure to replace 'localhost', 'username', 'password', and 'database' with your own MySQL server details.

This establishes a connection to the MySQL database, prepares an INSERT statement with placeholders, binds the values to the statement, executes the statement, and then closes the statement and database connection.

after following this you can run the google api oauth signin on your website 

NOTE: to see the error in your code or the things which are not visible on your browser run the  command -> sudo tail -f /var/log/apache2/error.log
