<!-- <?php
// Connect to MongoDB
$mongoClient = new MongoDB\Driver\Manager("mongodb://localhost:27017");
echo "Connection to database successfully\n";

// Select a database (replace 'examplesdb' with your actual database name)
$databaseName = 'demo';
$mongoDB = $mongoClient->$databaseName ->demoData;
echo "Database $databaseName selected\n";
?> -->


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
       