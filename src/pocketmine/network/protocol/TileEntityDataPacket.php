<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____  
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \ 
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/ 
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_| 
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 * 
 *
*/

namespace pocketmine\network\protocol;

#include <rules/DataPacket.h>


class TileEntityDataPacket extends PEPacket{
	const NETWORK_ID = Info::TILE_ENTITY_DATA_PACKET;
	const PACKET_NAME = "TILE_ENTITY_DATA_PACKET";

	public $x;
	public $y;
	public $z;
	public $namedtag;

	public function decode($playerProtocol){
		$this->getHeader($playerProtocol);
		$this->x = $this->getSignedVarInt();
		$this->y = $this->getVarInt();
		$this->z = $this->getSignedVarInt();
		$this->namedtag = $this->get(true);
	}

	public function encode($playerProtocol){
		$this->reset($playerProtocol);
		$this->putSignedVarInt($this->x);
		$this->putVarInt($this->y);
		$this->putSignedVarInt($this->z);
		$this->put($this->namedtag);
	}

}
