Outline of project:

The software functions as a music label's website that allows users to browse releases (collections of tracks i.e. album, single, EP etc.), and allows the owner to add new releases for users to see. 
In the future, this could be extended as a webstore or as a place for fans to get updates on the label. 

I decided to implement the project as a single-page application since I was interested to know how they worked.
There are a number of single file Vue components (resources/js/components/) which make up the majority of the front end, which use API routes defined in Laravel to request/send data when they need to. 
	
There is one blade file, home.blade.php (plus a template), returned from the only web GET request which links to app.js, which then starts Vue and loads the other components.

MySQL is used to store data, with migrations and a seeder in laravel to create some fake data - as far as I'm aware, a database will need to be set up and configured accordingly in .env before this can work elsewhere.

There is not a huge amount of functionality at the moment but here is an overview of what's included so far:

Users can:

	- visit home page:
		- view a panel displaying 3 most recent releases

	- visit the releases page via the navigation bar:
		- view all releases
		- view releases by genre
		- add a new release which can contain any number of tracks

	- Open login/registration forms 

Things that could be implemented in future:

	- Images:
		-allow uploading of release covers
		-retrieve release coverers for view using API

	- Authentication:
		- connect Login and Signup forms to API endpoints to authenticate users

	- Authorization:
		- ensure only admins can add releases

	- View for individual releases:
		- clicking a release should load a view for it
		- from here admins should be able to edit a view

The Bootstrap template used can be found here: https://startbootstrap.com/template/shop-homepage
 
