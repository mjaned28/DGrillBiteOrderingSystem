import time
from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.by import By

class Browser:
    browser, service = None, None

    def __init__(self, driver: str):
        self.service = Service(driver)
        self.browser = webdriver.Chrome(service=self.service)

    def open_page(self, url: str):
        self.browser.get(url)

    def close_browser(self):
        self.browser.close()

    def add_input(self, by: By, value: str, text: str):
        field = self.browser.find_element(by=by, value=value)
        field.send_keys(text)
        time.sleep(1)

    def click_button(self, by: By, value: str):
        button = self.browser.find_element(by=by, value=value)
        button.click()
        time.sleep(1)

    def login_eclass(self, username: str, password: str):
        self.add_input(by=By.ID, value='email', text=username)
        self.add_input(by=By.ID, value='password', text=password)
        self.click_button(by=By.CLASS_NAME, value='submit-btn')


if __name__ == '__main__':
    browser = Browser('path')

    browser.open_page('https://dgrill-bite.online/login/login.php')
    time.sleep(10)

    browser.login_eclass(username='customer1@wmsu.edu.ph', password='customerr')
    time.sleep(10) 


