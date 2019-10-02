# ElsevierPureAPISearchTool
A PHP7 &amp; JavaScript customisable client search tool communicating with the Elsevier PURE Rest API. 

## About
Elsevier PURE API is a very famous API used by many academic institutions in the UK and abroad. The PURE platform stores all research output such as academic papers, abstracts, books, posters etc in addition to the institution researchers' information.

This search tool uses PHP and JavaScript to communicate via a Rest API with the PURE platform. Search criteria can be customised using the  Apache Lucene query syntax.

The tool allows user to use an inclusion list of keywords to search, it lets the user choose what type of research output s/he requires (books, abstracts etc...). It also allows the user to specify certain organisational units (i.e. schools, department, centres...). The tool also allows the user to choose a year or a range of years among many other features. 

Now I developped this tool for a client (University of St Andrews) so I will not include any logic that is too specific but I will share here the classes of PHP that allows you to communicate with the backend via the API. You can use these classes directly in your code without any changes and you would forget about any PHP code and focus on the front end JS logic.

You can find several functions defined in functions.php which you can use to communicate with backend using the Rest API either via PHP cURL or using the Guzzle PHP HTTP client.

I included also a big part of the front end HTML and JS code.

## Requirements
A web server such as Apache

## License
This program is licensed under MIT License - you are free to distribute, change, enhance and include any of the code of this application in your tools. I only expect adequate attribution and citation of this work. The attribution should include the title of the program, the author (me) and the site or the document where the program is taken from.
