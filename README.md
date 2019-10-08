# ElsevierPureAPISearchTool
A PHP7 &amp; JavaScript customisable client search tool communicating with the Elsevier PURE Rest API. 

## About
Elsevier PURE API [https://dev.elsevier.com/](https://dev.elsevier.com/) is a very famous API used by many academic institutions in the UK and abroad. The PURE platform stores all research output such as academic papers, abstracts, books, posters etc in addition to the institution researchers' information.

This search tool uses PHP and JavaScript to communicate via a Rest API with the PURE platform. Search criteria can be customised using the  Apache Lucene query syntax.

The tool allows user to use an inclusion list of keywords to search, it lets the user choose what type of research output s/he requires (books, abstracts etc...). It also allows the user to specify certain organisational units (i.e. schools, department, centres...). The tool also allows the user to choose a year or a range of years among many other features. 

Now I developped this tool for a client.  I will share here the classes of PHP that allows you to communicate with the backend via the API. You can find several functions defined in functions.php which you can use to communicate with backend using the Rest API either via PHP cURL or using the Guzzle PHP HTTP client.

You can use these PHP classes directly in your code without any changes and thus focus on the front end JS logic.

I included also a big part of the front end HTML and JS code.

## Requirements
A web server such as Apache

## Important Note
This code is for **educational purposes only**. Its sole aim is to teach you how to work with the Guzzle PHP client and with cURL to communicate with the backend platfom using HTTP verbs. It also helps all the folks struggling with the Elsevier PURE API which is extremely cryptic and frustrating to work with. Hope this gets you started with your project!

## Useful Links
 * [Link to PURE Portal](https://www.elsevier.com/en-gb/solutions/pure)
 * [Elsevier PURE API Documentation](https://dev.elsevier.com/)

## License
This program is licensed under MIT License - you are free to distribute, change, enhance and include any of the code of this application in your tools. I only expect adequate attribution and citation of this work. The attribution should include the title of the program, the author (me) and the site or the document where the program is taken from.
