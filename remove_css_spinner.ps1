$file = Get-ChildItem c:\Users\dughu\Downloads\public_html\resources\views\*collège*.blade.php | Select-Object -First 1
$path = $file.FullName
$content = Get-Content $path -Raw

$lines = Get-Content $path
$newLines = @()
$skip = $false

foreach ($l in $lines) {
    $t = $l.Trim()
    if ($t -like '.spinner-moderne *') {
        $skip = $true
        continue
    }
    if ($skip) {
        if ($t -like '@keyframes spin*') {
            $skip = $false
        }
        continue
    }
    $newLines += $l
}

$newContent = ($newLines -join "`n")
Set-Content $path $newContent
Write-Host "CSS spinner supprimé de: $path" -ForegroundColor Green