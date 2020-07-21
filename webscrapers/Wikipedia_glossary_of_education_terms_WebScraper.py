"""
Author: Dr. Hussein Bakri
Description: A simple web scraper to capture all the glossary educational terms found on 
https://en.wikipedia.org/wiki/Glossary_of_education_terms
The structure of the website might change. If this happens this code needs to be updated.
Result: keywords are stored in the out_txts folder in final_Wikipedia_education_terms.txt

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

def Wikipedia_process_content_URL(URL:str):
    """Function that takes the URL as a string
    it sleeps a bit so that the web browser load successfully the web page
    Downloads content, parses it, extracts headers as keywords
    it returns a list of keywords
    """
    anchors_list = []
    trong_tag_list = []

    print(f"\nFetching the URL: {URL} ------------------")
    browser.get(URL)

    # Wait until the browser loads the URL properly
    print("\nSleeping for 10 seconds ------------------")
    time.sleep(10)
    
    Current_Page_Content = browser.page_source.encode('utf-8').strip()
    
    # Parsing the html page
    soup = BeautifulSoup(Current_Page_Content, 'html.parser')
    # print(soup.prettify())
    
    # Finding all dls and then all the anchors in them and then appending them to anchors_list
    # Find all anchors text inside <dl>/ strip is for removing empty spaces
    all_dls = soup.find_all('dl')
    for dl in all_dls:
        Current_dl_list_ofAnchors = dl.find_all('a')
        for anchor in Current_dl_list_ofAnchors:
            current_anchor_text = anchor.get_text().strip().lower()
            
            # Cleaning logic of the list: no empty items, no items of 1, 2 or 3 characters
            if(current_anchor_text == ""):
                continue
            elif(len(current_anchor_text)<4):
                continue
            else:
                anchors_list.append(current_anchor_text)
 
    # 1) Removing empty string items from the list
    while("" in anchors_list) :
        anchors_list.remove("") 

    # print("\nAnchors list in this iteration--------")
    # print(anchors_list)

    print(f"\nFinished parsing & storing keywords from URL: {URL}--------------")
    return anchors_list
   

# Opening the text files that contains the URL (one at a line)
# Storing URLs in list
with open('URLs/Wikipedia_URLs.txt') as f:
    Wikipedia_URL_list = f.read().splitlines()

# Processing Wikipedia for Keywords
for URL in Wikipedia_URL_list:
    results_list = Wikipedia_process_content_URL(URL)
    # Writing texts of anchors to keywords file  
    with open('Wikipedia_glossary_of_education_terms.txt', 'a') as f:
        for item in results_list:
            f.write("%s\n" % item)
    print("\nSleeping for 10 seconds ------------------")
    time.sleep(10)

print("\nFinished all processing ----- Closing browser......")
browser.quit()

print("\nCleaning up now / Removing ducplicates etc......")
# Final check and cleanup on all the keywords.txt
# 1) no duplicates
# 2) Should not have any word that is in the UnwantedWords.txt list
with open('UnwantedWords.txt') as f:
    unwanted_words_file_list = f.read().splitlines()

# Remove duplicates
lines_seen = set() # holds lines already seen
outfile = open("Wikipedia_education_terms_noduplicates.txt", "w")
for line in open("Wikipedia_glossary_of_education_terms.txt", "r"):
    if line not in lines_seen: # not a duplicate
        outfile.write(line)
        lines_seen.add(line)
outfile.close()

# Writing texts of anchors to keywords file 
nd =  open("output_txts/final_Wikipedia_education_terms.txt", "w")
for item in open('Wikipedia_education_terms_noduplicates.txt', 'r'):    
    if item.strip() in unwanted_words_file_list:        
        continue
    nd.write(item)
nd.close()
    



