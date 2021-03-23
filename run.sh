#!/bin/bash

docker run -i -t -p "80:80" -p "3306:3306" --name=carato -v ${PWD}:/app mattrayner/lamp:latest-1804-php7