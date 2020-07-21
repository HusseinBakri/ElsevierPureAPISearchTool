"""
Author: Dr. Hussein Bakri
Description: A simple web scraper to capture all the glossary educational terms found on 
http://www.gostudyuk.com/glossary/
The structure of the website might change. If this happens this code needs to be updated.
Result: keywords are stored in the out_txts folder in Gostudyuk_keywords.txt

Requirements:
Beautiful Soup
--------------
pip install beautifulsoup4

Selenium WebDriver Python
--------------------------
pip install selenium

Please download the webdriver specific to the version of the browser you are using
Google Chrome: https://chromedriver.chromium.org/downloads
"""

from selenium import webdriver
import time
import requests
from bs4 import BeautifulSoup
from re import sub
from decimal import Decimal


My_User_Agent = 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36'
browser = webdriver.Chrome('SeleniumDrivers/chromedriver')
browser.maximize_window()


def Gostudyuk_process_content_URL(URL:str):
    """Function that takes the URL of http://www.gostudyuk.com/glossary/ as a string
    from a file in folder URLs/ and then it scrapes the page then it
    stores the results in a file Gostudyuk_keywords.txt in folder output_txts
    """
    anchors_list = []
    strong_tag_list = []

    print(f"\nFetching the URL: {URL} ------------------")
    browser.get(URL)

    # Wait until the browser loads the URL properly
    print("\nSleeping for 10 seconds ------------------")
    time.sleep(10)
    
    Current_Page_Content = browser.page_source.encode('utf-8').strip()
    
    # Parsing the html page
    soup = BeautifulSoup(Current_Page_Content, 'html.parser')
    # print(soup.prettify())
    
    # Finding all strong tags - strip is used for removing empty spaces
    all_strong_tags = soup.find_all('strong')
    for tag in all_strong_tags[1:]:
        current_strong_text = tag.get_text().strip()           
        strong_tag_list.append(current_strong_text)
 
    print(f"\nFinished parsing and storing Gostudyuk keywords - {URL}--------------")
    return strong_tag_list
    
    
results_list = []
# Reading from the URL file
# On Windows /, on Linux/Mac should be \
with open('URLs/gostudyuk_glossary_URL.txt') as f:
    gostudyuk_glossary_URL = f.read().splitlines()
    # Processing gostudyuk glossary for keywords
    results_list = Gostudyuk_process_content_URL(gostudyuk_glossary_URL[0])

# Writing texts of anchors to keywords file
# On Windows /, on Linux/Mac should be \  
with open('output_txts/Gostudyuk_keywords.txt', 'a') as f:
    for tag in results_list:
        f.write("%s\n" % tag)

print("\nFinished all processing ----- Quiting......")
browser.quit()


