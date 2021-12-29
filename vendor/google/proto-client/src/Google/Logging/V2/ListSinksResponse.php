<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/logging/v2/logging_config.proto

namespace Google\Logging\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Result returned from `ListSinks`.
 *
 * Generated from protobuf message <code>google.logging.v2.ListSinksResponse</code>
 */
class ListSinksResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * A list of sinks.
     *
     * Generated from protobuf field <code>repeated .google.logging.v2.LogSink sinks = 1;</code>
     */
    private $sinks;
    /**
     * If there might be more results than appear in this response, then
     * `nextPageToken` is included.  To get the next set of results, call the same
     * method again using the value of `nextPageToken` as `pageToken`.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     */
    private $next_page_token = '';

    public function __construct() {
        \GPBMetadata\Google\Logging\V2\LoggingConfig::initOnce();
        parent::__construct();
    }

    /**
     * A list of sinks.
     *
     * Generated from protobuf field <code>repeated .google.logging.v2.LogSink sinks = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getSinks()
    {
        return $this->sinks;
    }

    /**
     * A list of sinks.
     *
     * Generated from protobuf field <code>repeated .google.logging.v2.LogSink sinks = 1;</code>
     * @param \Google\Logging\V2\LogSink[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setSinks($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Logging\V2\LogSink::class);
        $this->sinks = $arr;

        return $this;
    }

    /**
     * If there might be more results than appear in this response, then
     * `nextPageToken` is included.  To get the next set of results, call the same
     * method again using the value of `nextPageToken` as `pageToken`.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->next_page_token;
    }

    /**
     * If there might be more results than appear in this response, then
     * `nextPageToken` is included.  To get the next set of results, call the same
     * method again using the value of `nextPageToken` as `pageToken`.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setNextPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->next_page_token = $var;

        return $this;
    }

}

