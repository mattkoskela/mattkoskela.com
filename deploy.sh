#!/usr/bin/env bash

# verify that required tools are installed
aws --version > /dev/null 2>&1
if [ $? -ne 0 ]; then
    echo -e "ERROR: aws is not installed${NC}"
    exit 1
fi

# exit if a command fails
set -e

# set env values for s3 bucket and js build args
S3=www.mattkoskela.com

# build site
echo "Building site..."
rm -rf public
npm run build

# upload to s3
echo "Uploading to S3..."
aws s3 sync public s3://$S3 --acl=public-read --exclude .DS_Store --exclude "*.js.map"

echo "Successfully deployed site"