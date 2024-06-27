<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display MongoDB Data in UI</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
// Connect to MongoDB
$mongoClient = new MongoDB\Driver\Manager("mongodb://localhost:27017");
echo "Connection to database successfully\n";

// Specify database and collection
$databaseName = 'demo';
$collectionName = 'demoData';

// Query to fetch data from MongoDB
$query = new MongoDB\Driver\Query([]);

// Execute the query
$cursor = $mongoClient->executeQuery("$databaseName.$collectionName", $query);

// Fetch the data
$data = [];
foreach ($cursor as $document) {
    $data[] = $document;
}
?>

<h2>MongoDB Data: <?php echo "$databaseName.$collectionName"; ?></h2>
<table>
    <tr>
        <th>Name</th>
    </tr>
    <?php foreach ($data as $document): ?>
        <tr>
            <td><?php echo $document->name; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
