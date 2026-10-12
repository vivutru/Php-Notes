find . -name "*.php" -type f | sort -V | while read -r f; do
  echo "=== $f ==="
  cat "$f"
  echo
done
