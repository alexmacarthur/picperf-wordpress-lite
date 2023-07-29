#!/bin/bash

echo "Building production version of plugin..."

rm -rf ../picperf-lite-build
mkdir -p ../picperf-lite-build/picperf-lite
cp -a ./ ../picperf-lite-build/picperf-lite

FILES_TO_DELETE=(
    "tests"
    ".git"
    ".gitignore"
    "build.sh"
    "README.md"
    "composer.json"
    "composer.lock"
)

rm -rf ../picperf-lite-build/picperf-lite/vendor

for item in "${FILES_TO_DELETE[@]}"; do
    path_to_delete="../picperf-lite-build/picperf-lite/$item"
    echo "Deleting $path_to_delete"
    rm -rf $path_to_delete
done

cd ../picperf-lite-build
echo "Zipping..."
zip -r "picperf-lite.zip" ./picperf-lite
cd ../picperf-lite

echo "Done!"
