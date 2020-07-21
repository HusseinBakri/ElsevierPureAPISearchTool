"""
Author: Dr. Hussein Bakri
Description: A simple web scraper to capture all the glossary educational terms found on http://www.dictionaryofeducation.co.uk/
The structure of the website might change. If this happens this code needs to be updated.
Result: keywords are stored in the out_txts folder in Dictionay_of_Education_keywords.txt

Requirements:
Beautiful Soup
--------------
pip install beautifulsoup4

Selenium WebDriver Python
--------------------------
pip install selenium

Please download the webdriver specific to the version of the browser you are using
Chrome: https://chromedriver.chromium.org/downloads
"""

# For web scraping projects always check the robot.txt
from selenium import webdriver
import time
import requests
from bs4 import BeautifulSoup
from re import sub
from decimal import Decimal
import re

My_User_Agent = 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36'
browser = webdriver.Chrome('SeleniumDrivers/chromedriver')
browser.maximize_window()

def dictionary_of_education_process_content_URL(URL:str):
    """Function that takes the URL of http://www.dictionaryofeducation.co.uk/a/a/blog (string)
    from a file in folder URLs/ and then web scrape the page
    returns a list of keywords
    """
    anchor_tag_list = []

    print(f"\nFetching the URL: {URL} ------------------")
    browser.get(URL)

    # Wait until the browser loads the URL properly
    print("\nSleeping for 10 seconds ------------------")
    time.sleep(10)
    
    Current_Page_Content = browser.page_source.encode('utf-8').strip()
    
    # Parsing the html page
    soup = BeautifulSoup(Current_Page_Content, 'html.parser')
    # print(soup.prettify())

    # Finding all h1 tags with class title
    # find_all() returns a list of tags found
    all_h1_with_class_title = soup.find_all('h1' , {"class": "title"})

    for h1 in all_h1_with_class_title:
        # For each h1 tag get the content (i.e. text) of the anchor tag inside
        anchor_tag = h1.find('a').contents[0]
        # Append the content to anchor_tag_list
        anchor_tag_list.append(anchor_tag)

    print(f"\nFinished parsing and storing Dictionary of education keywords for: {URL}--------------")
    return anchor_tag_list
    
    
dictionaryofeducation_URLs = [
"http://www.dictionaryofeducation.co.uk/a/a/blog",
"http://www.dictionaryofeducation.co.uk/b/b/blog",
"http://www.dictionaryofeducation.co.uk/c/c/blog",
"http://www.dictionaryofeducation.co.uk/d/d/blog",
"http://www.dictionaryofeducation.co.uk/e/e/blog",
"http://www.dictionaryofeducation.co.uk/f/f/blog",
"http://www.dictionaryofeducation.co.uk/g/g/blog",
"http://www.dictionaryofeducation.co.uk/h/h/blog",
"http://www.dictionaryofeducation.co.uk/i/i/blog",
"http://www.dictionaryofeducation.co.uk/j/j/blog",
"http://www.dictionaryofeducation.co.uk/k/k/blog",
"http://www.dictionaryofeducation.co.uk/l/l/blog",
"http://www.dictionaryofeducation.co.uk/m/m/blog",
"http://www.dictionaryofeducation.co.uk/n/n/blog",
"http://www.dictionaryofeducation.co.uk/o/o/blog",
"http://www.dictionaryofeducation.co.uk/p/p/blog",
"http://www.dictionaryofeducation.co.uk/q/q/blog",
"http://www.dictionaryofeducation.co.uk/r/r/blog",
"http://www.dictionaryofeducation.co.uk/s/s/blog",
"http://www.dictionaryofeducation.co.uk/t/t/blog",
"http://www.dictionaryofeducation.co.uk/u/u/blog",
"http://www.dictionaryofeducation.co.uk/v/v/blog",
"http://www.dictionaryofeducation.co.uk/w/w/blog",
"http://www.dictionaryofeducation.co.uk/y/y/blog",
"http://www.dictionaryofeducation.co.uk/z/z/blog"
]

# You can change the URL dynamically changing the letters 
# To read the URLs from a txt file uncomment the following - On Windows /, on Linux/Mac should be \ 
# with open('URLs/dictionaryofeducation_URLs.txt') as f:
#     dictionaryofeducation_URLs = f.read().splitlines()

# Processing each URL from dictionary_of_education website
for URL in dictionaryofeducation_URLs:
    iteration_result_list = dictionary_of_education_process_content_URL(URL)

    # Writing texts of anchors to keywords file
    # On Windows /, on Linux/Mac should be \  - a for appending  
    with open('output_txts/Dictionay_of_Education_keywords.txt', 'a') as f:
        for tag in iteration_result_list:
            f.write("%s\n" % tag)

    print("\nSleeping for 10 seconds ------------------")
    time.sleep(10)

print("\nFinished all scraping ----- Closing the browser......")
browser.quit()