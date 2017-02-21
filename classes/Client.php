<?php if (!defined("IN_WALLET")) { die("Auth Error!"); } ?>
<?php
//To enable developer mode (no need for an RPC server, set $devmode to 1

/**
 * Class Client
 */
class Client
{
    private $uri;
    private $jsonrpc;
    private $devmode = 0;


    /**
     * Client constructor.
     * @param $host
     * @param $port
     * @param $user
     * @param $pass
     */
    function __construct($host, $port, $user, $pass)
    {
        $this->uri     = "https://" . $user . ":" . $pass . "@" . $host . ":" . $port . "/";
        $this->jsonrpc = new jsonRPCClient($this->uri);
    }


    /**
     * @param $user_session
     * @return int
     */
    function getBalance($user_session)
    {
        if ($devmode == 0)
        {
            return $this->jsonrpc->getbalance("zelles(" . $user_session . ")", 6);
        }
        else
            {
                return 21;
            }
    }


    /**
     * @param $user_session
     * @return array
     */
    function getAddress($user_session)
    {
        if ($devmode == 0) {
            return $this->jsonrpc->getaccountaddress("zelles(" . $user_session . ")");
        }
        else
        {
            return ["1test", "1test"];
        }
    }


    /**
     * @param $user_session
     * @return array
     */
    function getAddressList($user_session)
    {
        if ($devmode == 0)
        {
            return $this->jsonrpc->getaddressesbyaccount("zelles(" . $user_session . ")");
        } 
        else
            {
                return ["1test", "1test"];
            }

    }


    /**
     * @param $user_session
     * @return mixed
     */
    function getTransactionList($user_session)
    {
        if ($devmode == 0)
        {
            return $this->jsonrpc->listtransactions("zelles(" . $user_session . ")", 10);
        }
    }


    /**
     * @param $user_session
     * @return string
     */
    function getNewAddress($user_session)
    {
        if ($devmode == 0)
        {
            return $this->jsonrpc->getnewaddress("zelles(" . $user_session . ")");
        }
        else
            {
                return "1test";
            }
    }


    /**
     * @param $user_session
     * @param $address
     * @param $amount
     * @return string
     */
    function withdraw($user_session, $address, $amount)
    {
        if ($devmode == 0)
        {
            return $this->jsonrpc->sendfrom("zelles(" . $user_session . ")", $address, (float)$amount, 6);
        } 
        else
            {
                return "ok wow";
            }
    }
}


?>
