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

declare(strict_types=1);

namespace pocketmine\network\mcpe;

use pocketmine\inventory\Inventory;
use pocketmine\item\Item;

final class InventoryManagerPredictedChanges{
	/**
	 * @var Item[]
	 * @phpstan-var array<int, Item>
	 */
	private array $slots = [];

	public function __construct(
		private Inventory $inventory
	){}

	public function getInventory() : Inventory{ return $this->inventory; }

	/**
	 * @return Item[]
	 * @phpstan-return array<int, Item>
	 */
	public function getSlots() : array{
		return $this->slots;
	}

	public function getSlot(int $slot) : ?Item{
		return $this->slots[$slot] ?? null;
	}

	public function add(int $slot, Item $item) : void{
		$this->slots[$slot] = $item;
	}

	public function remove(int $slot) : void{
		unset($this->slots[$slot]);
	}
}