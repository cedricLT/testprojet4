<?php
function isConnect()
{
if (!isset($_SESSION ['pseudo'])) throw new Exception('vous etes pas administrateur');

}