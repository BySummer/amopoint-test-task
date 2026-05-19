<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jokes Filter</title>
</head>
<body>

<h2>Jokes</h2>

<select id="type">
    <option value="all">All</option>
    <option value="short">Short</option>
    <option value="long">Long</option>
</select>

<div id="list"></div>

<script src="{{ asset('js/jokes-filter.js') }}"></script>

</body>
</html>
