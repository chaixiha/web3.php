<?php

namespace Test\Unit;

use RuntimeException;
use Test\TestCase;
use Web3\Web3;
use Web3\Eth;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\RequestManager;

class EthTest extends TestCase
{
    /**
     * web3
     * 
     * @var \Web3\Web3
     */
    protected $web3;

    /**
     * setUp
     * 
     * @return void
     */
    public function setUp()
    {
        $web3 = new Web3('https://rinkeby.infura.io/vuethexplore');
        $this->web3 = $web3;
    }

    /**
     * testProtocolVersion
     * 
     * @return void
     */    
    public function testProtocolVersion()
    {
        $eth = $this->web3->eth;

        $eth->protocolVersion(function ($err, $version) {
            if ($err !== null) {
                return $this->fail($err->getMessage());
            }
            if (isset($version->result)) {
                $this->assertTrue(is_string($version->result));
            } else {
                $this->fail($version->error->message);
            }
        });
    }

    /**
     * testSyncing
     * 
     * @return void
     */    
    public function testSyncing()
    {
        $eth = $this->web3->eth;

        $eth->syncing(function ($err, $syncing) {
            if ($err !== null) {
                return $this->fail($err->getMessage());
            }
            if (isset($syncing->result)) {
                // due to the result might be object or bool, only test is null
                $this->assertTrue($syncing->result !== null);
            } else {
                $this->fail($syncing->error->message);
            }
        });
    }

    /**
     * testCoinbase
     * 
     * @return void
     */    
    public function testCoinbase()
    {
        $eth = $this->web3->eth;

        $eth->coinbase(function ($err, $coinbase) {
            if ($err !== null) {
                // infura banned us to use coinbase
                return $this->assertTrue($err->getCode() === 405);
            }
            if (isset($coinbase->result)) {
                $this->assertTrue(is_string($coinbasse->result));
            } else {
                $this->fail($coinbase->error->message);
            }
        });
    }

    /**
     * testMining
     * 
     * @return void
     */    
    public function testMining()
    {
        $eth = $this->web3->eth;

        $eth->mining(function ($err, $mining) {
            if ($err !== null) {
                return $this->fail($err->getMessage());
            }
            if (isset($mining->result)) {
                $this->assertTrue($mining->result !== null);
            } else {
                $this->fail($mining->error->message);
            }
        });
    }

    /**
     * testHashrate
     * 
     * @return void
     */    
    public function testHashrate()
    {
        $eth = $this->web3->eth;

        $eth->hashrate(function ($err, $hashrate) {
            if ($err !== null) {
                return $this->fail($err->getMessage());
            }
            if (isset($hashrate->result)) {
                $this->assertTrue(is_string($hashrate->result));
            } else {
                $this->fail($hashrate->error->message);
            }
        });
    }

    /**
     * testGasPrice
     * 
     * @return void
     */    
    public function testGasPrice()
    {
        $eth = $this->web3->eth;

        $eth->gasPrice(function ($err, $gasPrice) {
            if ($err !== null) {
                return $this->fail($err->getMessage());
            }
            if (isset($gasPrice->result)) {
                $this->assertTrue(is_string($gasPrice->result));
            } else {
                $this->fail($gasPrice->error->message);
            }
        });
    }

    /**
     * testAccounts
     * 
     * @return void
     */    
    public function testAccounts()
    {
        $eth = $this->web3->eth;

        $eth->accounts(function ($err, $accounts) {
            if ($err !== null) {
                return $this->fail($err->getMessage());
            }
            if (isset($accounts->result)) {
                $this->assertTrue(is_array($accounts->result));
            } else {
                $this->fail($accounts->error->message);
            }
        });
    }

    /**
     * testBlockNumber
     * 
     * @return void
     */    
    public function testBlockNumber()
    {
        $eth = $this->web3->eth;

        $eth->blockNumber(function ($err, $blockNumber) {
            if ($err !== null) {
                return $this->fail($err->getMessage());
            }
            if (isset($blockNumber->result)) {
                $this->assertTrue(is_string($blockNumber->result));
            } else {
                $this->fail($blockNumber->error->message);
            }
        });
    }

    /**
     * testGetBalance
     * 
     * @return void
     */    
    public function testGetBalance()
    {
        $eth = $this->web3->eth;

        $eth->getBalance('0x407d73d8a49eeb85d32cf465507dd71d507100c1', function ($err, $balance) {
            if ($err !== null) {
                return $this->fail($err->getMessage());
            }
            if (isset($balance->result)) {
                $this->assertTrue(is_string($balance->result));
            } else {
                $this->fail($balance->error->message);
            }
        });
    }

    /**
     * testGetStorageAt
     * 
     * @return void
     */    
    public function testGetStorageAt()
    {
        $eth = $this->web3->eth;

        $eth->getStorageAt('0x407d73d8a49eeb85d32cf465507dd71d507100c1', '0x0', function ($err, $storage) {
            if ($err !== null) {
                return $this->fail($err->getMessage());
            }
            if (isset($storage->result)) {
                $this->assertTrue(is_string($storage->result));
            } else {
                $this->fail($storage->error->message);
            }
        });
    }

    /**
     * testGetTransactionCount
     * 
     * @return void
     */    
    public function testGetTransactionCount()
    {
        $eth = $this->web3->eth;

        $eth->getTransactionCount('0x407d73d8a49eeb85d32cf465507dd71d507100c1', function ($err, $transactionCount) {
            if ($err !== null) {
                return $this->fail($err->getMessage());
            }
            if (isset($transactionCount->result)) {
                $this->assertTrue(is_string($transactionCount->result));
            } else {
                $this->fail($transactionCount->error->message);
            }
        });
    }

    /**
     * testGetBlockTransactionCountByHash
     * 
     * @return void
     */    
    public function testGetBlockTransactionCountByHash()
    {
        $eth = $this->web3->eth;

        $eth->getBlockTransactionCountByHash('0xb903239f8543d04b5dc1ba6579132b143087c68db1b2168786408fcbce568238', function ($err, $transactionCount) {
            if ($err !== null) {
                return $this->fail($err->getMessage());
            }
            if (isset($transactionCount->result)) {
                $this->assertTrue(is_string($transactionCount->result));
            } else {
                if (isset($transactionCount->error)) {
                    $this->fail($transactionCount->error->message);
                } else {
                    $this->assertTrue(true);
                }
            }
        });
    }

    /**
     * testGetBlockTransactionCountByNumber
     * 
     * @return void
     */    
    public function testGetBlockTransactionCountByNumber()
    {
        $eth = $this->web3->eth;

        $eth->getBlockTransactionCountByNumber('0x0', function ($err, $transactionCount) {
            if ($err !== null) {
                return $this->fail($err->getMessage());
            }
            if (isset($transactionCount->result)) {
                $this->assertTrue(is_string($transactionCount->result));
            } else {
                if (isset($transactionCount->error)) {
                    $this->fail($transactionCount->error->message);
                } else {
                    $this->assertTrue(true);
                }
            }
        });
    }

    /**
     * testGetUncleCountByBlockHash
     * 
     * @return void
     */    
    public function testGetUncleCountByBlockHash()
    {
        $eth = $this->web3->eth;

        $eth->getUncleCountByBlockHash('0xb903239f8543d04b5dc1ba6579132b143087c68db1b2168786408fcbce568238', function ($err, $uncleCount) {
            if ($err !== null) {
                return $this->fail($err->getMessage());
            }
            if (isset($uncleCount->result)) {
                $this->assertTrue(is_string($uncleCount->result));
            } else {
                if (isset($uncleCount->error)) {
                    $this->fail($uncleCount->error->message);
                } else {
                    $this->assertTrue(true);
                }
            }
        });
    }

    /**
     * testGetUncleCountByBlockNumber
     * 
     * @return void
     */    
    public function testGetUncleCountByBlockNumber()
    {
        $eth = $this->web3->eth;

        $eth->getUncleCountByBlockNumber('0x0', function ($err, $uncleCount) {
            if ($err !== null) {
                return $this->fail($err->getMessage());
            }
            if (isset($uncleCount->result)) {
                $this->assertTrue(is_string($uncleCount->result));
            } else {
                if (isset($uncleCount->error)) {
                    $this->fail($uncleCount->error->message);
                } else {
                    $this->assertTrue(true);
                }
            }
        });
    }

    /**
     * testGetCode
     * 
     * @return void
     */    
    public function testGetCode()
    {
        $eth = $this->web3->eth;

        $eth->getCode('0x407d73d8a49eeb85d32cf465507dd71d507100c1', function ($err, $code) {
            if ($err !== null) {
                return $this->fail($err->getMessage());
            }
            if (isset($code->result)) {
                $this->assertTrue(is_string($code->result));
            } else {
                $this->fail($code->error->message);
            }
        });
    }

    /**
     * testSign
     * 
     * @return void
     */    
    public function testSign()
    {
        $eth = $this->web3->eth;

        $eth->sign('0x407d73d8a49eeb85d32cf465507dd71d507100c1', '0xdeadbeaf', function ($err, $sign) {
            if ($err !== null) {
                // infura banned us to sign message
                return $this->assertTrue($err->getCode() === 405);
            }
            if (isset($sign->result)) {
                $this->assertTrue(is_string($sign->result));
            } else {
                $this->fail($sign->error->message);
            }
        });
    }

    /**
     * testSendTransaction
     * 
     * @return void
     */    
    public function testSendTransaction()
    {
        $eth = $this->web3->eth;

        $eth->sendTransaction([
            'from' => "0xb60e8dd61c5d32be8058bb8eb970870f07233155",
            'to' => "0xd46e8dd67c5d32be8058bb8eb970870f07244567",
            'gas' => "0x76c0",
            'gasPrice' => "0x9184e72a000",
            'value' => "0x9184e72a",
            'data' => "0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675"
        ], function ($err, $transaction) {
            if ($err !== null) {
                // infura banned us to send transaction
                return $this->assertTrue($err->getCode() === 405);
            }
            if (isset($transaction->result)) {
                $this->assertTrue(is_string($transaction->result));
            } else {
                if (isset($transaction->error)) {
                    // it's just test hex.
                    $this->assertTrue(is_string($transaction->error->message));
                } else {
                    $this->assertTrue(true);
                }
            }
        });
    }

    /**
     * testSendRawTransaction
     * 
     * @return void
     */    
    public function testSendRawTransaction()
    {
        $eth = $this->web3->eth;

        $eth->sendRawTransaction('0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675', function ($err, $transaction) {
            if ($err !== null) {
                return $this->fail($err->getMessage());
            }
            if (isset($transaction->result)) {
                $this->assertTrue(is_string($transaction->result));
            } else {
                if (isset($transaction->error)) {
                    // it's just test hex.
                    $this->assertTrue(is_string($transaction->error->message));
                } else {
                    $this->assertTrue(true);
                }
            }
        });
    }

    /**
     * testCall
     * 
     * @return void
     */    
    public function testCall()
    {
        $eth = $this->web3->eth;

        $eth->call([
            'from' => "0xb60e8dd61c5d32be8058bb8eb970870f07233155",
            'to' => "0xd46e8dd67c5d32be8058bb8eb970870f07244567",
            'gas' => "0x76c0",
            'gasPrice' => "0x9184e72a000",
            'value' => "0x9184e72a",
            'data' => "0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675"
        ], function ($err, $transaction) {
            if ($err !== null) {
                return $this->fail($err->getMessage());
            }
            if (isset($transaction->result)) {
                $this->assertTrue(is_string($transaction->result));
            } else {
                if (isset($transaction->error)) {
                    // it's just test hex.
                    $this->assertTrue(is_string($transaction->error->message));
                } else {
                    $this->assertTrue(true);
                }
            }
        });
    }

    /**
     * testEstimateGas
     * 
     * @return void
     */    
    public function testEstimateGas()
    {
        $eth = $this->web3->eth;

        $eth->estimateGas([
            'from' => "0xb60e8dd61c5d32be8058bb8eb970870f07233155",
            'to' => "0xd46e8dd67c5d32be8058bb8eb970870f07244567",
            'gas' => "0x76c0",
            'gasPrice' => "0x9184e72a000",
            'value' => "0x9184e72a",
            'data' => "0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675"
        ], function ($err, $gas) {
            if ($err !== null) {
                return $this->fail($err->getMessage());
            }
            if (isset($gas->result)) {
                $this->assertTrue(is_string($gas->result));
            } else {
                if (isset($gas->error)) {
                    // it's just test hex.
                    $this->assertTrue(is_string($gas->error->message));
                } else {
                    $this->assertTrue(true);
                }
            }
        });
    }

    /**
     * testGetBlockByHash
     * 
     * @return void
     */    
    public function testGetBlockByHash()
    {
        $eth = $this->web3->eth;

        $eth->getBlockByHash('0xb903239f8543d04b5dc1ba6579132b143087c68db1b2168786408fcbce568238', false, function ($err, $block) {
            if ($err !== null) {
                return $this->fail($err->getMessage());
            }
            if (isset($block->result)) {
                $this->assertTrue(is_string($block->result));
            } else {
                if (isset($block->error)) {
                    $this->fail($block->error->message);
                } else {
                    $this->assertTrue(true);
                }
            }
        });
    }

    /**
     * testUnallowedMethod
     * 
     * @return void
     */
    public function testUnallowedMethod()
    {
        $this->expectException(RuntimeException::class);

        $eth = $this->web3->eth;

        $eth->hello(function ($err, $hello) {
            if ($err !== null) {
                return $this->fail($err->getMessage());
            }
            if (isset($hello->result)) {
                $this->assertTrue(true);
            } else {
                $this->fail($hello->error->message);
            }
        });
    }
}