#!/bin/sh
# File permission fixer loop
# Monitors TARGET directory and ensures files are readable by web server (644 = rw-r--r--)

TARGET=${TARGET:-/var/www/html}
INTERVAL=${INTERVAL:-1}
VERBOSE=${VERBOSE:-1}

log() {
    echo "[$(date +'%Y-%m-%d %H:%M:%S')] $*" >&2
}

# Check if target directory exists
if [ ! -d "$TARGET" ]; then
    log "ERROR: Target directory $TARGET does not exist!"
    exit 1
fi

log "Starting file permission fixer"
log "Target: $TARGET"
log "Interval: ${INTERVAL}s"

# Initial fix of all existing files
log "Fixing permissions on existing files..."
find "$TARGET" -type f -exec chmod 644 {} \; 2>&1
log "Fixed existing files"

log "Starting monitor loop..."

# Monitor loop - fix permissions on all files periodically
while true; do
    # Set all files to 644 (world-readable)
    count=$(find "$TARGET" -type f -exec chmod 644 {} \; -print 2>/dev/null | wc -l)
    if [ "$VERBOSE" = "1" ] && [ "$count" -gt 0 ]; then
        log "Checked $count files"
    fi
    sleep "$INTERVAL"
done

