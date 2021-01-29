<?php

namespace Beekalam\NiraGateway;

class Constants
{
    public const BASE_URI = 'http://api.parsair.ir/ws1';

    public const AVAILABILITY_URI = self::BASE_URI."/AvailabilityJS.jsp";

    public const FARE_URI = self::BASE_URI."/FareJS.jsp";

    public const GATEWAY_TIMEOUT = 5.0;
}
