"""
Author: Dr. Hussein Bakri
Description: A simple web scraper to capture all the dictionary educational terms found on
the official Oxford Dictionary of Education  (2 edition) edited by Susan Wallace 
URL = "https://www.oxfordreference.com/view/10.1093/acref/9780199679393.001.0001/acref-9780199679393"
The structure of the website might change. If this happens, this code needs to be updated.
Result: keywords are stored in the out_txts folder in Oxford_Dictionay_of_Education_keywords.txt

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

My_User_Agent = 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36'
browser = webdriver.Chrome('SeleniumDrivers/chromedriver')
browser.maximize_window()

def oxford_dictionary_of_education_scrape_URL(URL:str):
    """Function that takes the URL as a string then web scrape the page
    it returns a list of keywords
    """
    anchor_tag_list = []

    print(f"\nFetching the URL: {URL} ------------------")
    browser.get(URL)

    # Wait until the browser loads the URL properly
    print("\nSleeping for 15 seconds ------------------")
    time.sleep(15)
    
    Current_Page_Content = browser.page_source.encode('utf-8').strip()
    
    # Parsing the html page
    soup = BeautifulSoup(Current_Page_Content, 'html.parser')
    # print(soup.prettify())

    # Finding all h1 tags with class title
    all_h1_with_class_title = soup.find_all('h2' , {"class": "itemTitle"})

    for h1 in all_h1_with_class_title:
        # For each h1 tag get the content (i.e. text) of the anchor tag inside
        # anchor_tag = h1.find('a').contents[0]
        anchor_tag = h1.find('a').get_text()
        # Append the content to anchor_tag_list
        anchor_tag_list.append(anchor_tag)

    print(f"\nFinished parsing and storing Dictionary of education keywords for: {URL}--------------")
    return anchor_tag_list


# file = 'oxford_dictionary_of_education_URLs.txt'
# test_URL = 'https://www.oxfordreference.com/view/10.1093/acref/9780199679393.001.0001/acref-9780199679393?btog=chap&hide=true&pageSize=100&skipEditions=true&sort=titlesort&source=%2F10.1093%2Facref%2F9780199679393.001.0001%2Facref-9780199679393'

# Reading from the URL file
# On Windows /, on Linux/Mac should be \
with open('URLs/oxford_dictionary_of_education_URLs.txt') as f:
    oxford_dictionary_of_education_URLs = f.read().splitlines()
    # Scraping each URL for keywords
    for URL in oxford_dictionary_of_education_URLs:
        results_list = oxford_dictionary_of_education_scrape_URL(URL)
        print("\nSleeping for additional 3 seconds ------------------")
        time.sleep(3)
        # Writing texts of anchors to keywords file
        # On Windows /, on Linux/Mac should be \  - a for appending  
        with open('output_txts/Oxford_Dictionay_of_Education_keywords.txt', 'a') as f:
            for tag in results_list:
                f.write("%s\n" % tag)

print("\nFinished all scraping ----- Closing the browser......")
browser.quit()