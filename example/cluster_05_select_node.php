<?php

include_once __DIR__ . '/../include.php';
include_once __DIR__ . '/lib_example.php';
// load production config
$config = include_once __DIR__ . '/../../_clickhouse_config_product.php';


$cl = new ClickHouseDB\Cluster($config);

$cl->setScanTimeOut(2.5); // 2500 ms
if (!$cl->isReplicasIsOk())
{
    throw new Exception('Replica state is bad , error='.$cl->getError());
}
//
$cluster_name='sharovara';
//
echo "> $cluster_name , count shard   = ".$cl->getClusterCountShard($cluster_name)." ; count replica = ".$cl->getClusterCountReplica($cluster_name)."\n";


// Выбрать IP содержащий строку ".248" типа 123.123.123.248, разделитель ; - если не найдена первая берется
$cli=$cl->clientLike($cluster_name,'.298;.964');
$cli->ping();
echo "\n----\nEND\n";
// ----------------------------------------------------------------------

