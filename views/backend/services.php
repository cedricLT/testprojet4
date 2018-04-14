<?php
function isConnect()
{
if (!isset($_SESSION ['pseudo'])) throw new Exception('vous n etes pas administrateur');

}