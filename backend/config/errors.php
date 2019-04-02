<?php
function returnNothing() {
    pj(['error' => 'Empty request']);
}
function notImplemented() {
    pj(['error' => 'Not implemented']);
}
function notSupported() {
    pj(['error' => 'Not supported']);
}