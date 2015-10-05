#!/usr/bin/env bash

cat replace.words | sed 's/\(.*\)\t\(.*\)/s\/\\b\1\\b\/\2\/g/' > replace.script

cat source.md | sed -f replace.script | cat > modern.md

# Decide
# cat modern.md | egrep -o '\b[А-Яа-я]+\b' | sort | uniq -c | sort -hr | head -n100

# http://new.gramota.ru/spravka/letters/69-ko-dnu с vs со
