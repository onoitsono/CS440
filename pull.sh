#!/bin/sh
git add .
git commit -m "testing"
git push origin onok
git reset --hard HEAD
git pull origin onok
chmod -c -R 0755 ./*