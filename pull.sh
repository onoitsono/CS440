#!/bin/sh
git reset --hard HEAD
git pull origin TBranch
chmod -c -R 0755 ./*
