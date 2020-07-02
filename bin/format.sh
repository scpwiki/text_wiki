#!/bin/bash
set -eu

# Run separately to avoid OOM
readonly directories=(
	'./Text'
	'./Tests'
)

function run() {
	# Output command
	echo "$@"

	# Then run
	"$@"
}

# Format all the directories
for dir in "${directories[@]}"; do
	run php bin/phpcbf.phar --standard=PSR2 "$dir"
done
