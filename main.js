const SHA256 = require('crypto-js/sha256')
const express = require('express');
const mongoose = require('mongoose');


const app = express();

class Block {
    constructor(index, timestamp, data, previousHash) {
        this.index = index;
        this.timestamp = timestamp;
        this.data = data;
        this.previousHash = previousHash;
        this.hash = this.calculateHash();
        this.nonce = 0;
    }

    calculateHash() {
        return SHA256(this.index + this.previousHash + this.timestamp + this.data + this.nonce).toString();
    }

    mineBlock(difficulty) {

    }
}

class Blockchain{
    constructor() {
        this.chain = [this.createGenesis()];
    }

    createGenesis() {
        return new Block(0, "01/01/2017", "Genesis block", "0")
    }

    latestBlock() {
        return this.chain[this.chain.length - 1]
    }

    addBlock(newBlock){
        newBlock.previousHash = this.latestBlock().hash;
        newBlock.hash = newBlock.calculateHash();
        this.chain.push(newBlock);
    }

    checkValid() {
        for(let i = 1; i < this.chain.length; i++) {
            const currentBlock = this.chain[i];
            const previousBlock = this.chain[i - 1];

            if (currentBlock.hash !== currentBlock.calculateHash()) {
                return false;
            }

            if (currentBlock.previousHash !== previousBlock.hash) {
                return false;
            }
        }
        return true;
    }
}

let jsChain = new Blockchain();
jsChain.addBlock(new Block("12/25/2017", {amount: 5}));
jsChain.addBlock(new Block("12/26/2017", {amount: 10}));
jsChain.valid = true;



app.get('/', (req,res) => {
  //res.send(JSON.stringify(jsChain, null, 4) + "\n" + "Is blockchain valid? " + jsChain.checkValid());
  res.send((jsChain));
});
app.listen(1133);
