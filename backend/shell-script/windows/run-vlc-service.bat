set folderPath=%1
cd ../../../vlc
vlc/vlc.exe --intf http --http-host localhost:8080 -LZ %folderPath%