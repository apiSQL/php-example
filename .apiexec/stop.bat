#!/bin/bash
echo "I will stop the nodejs application ..."
::taskkill /im php.exe
::forever start server.js
taskkill /f /im php.exe
