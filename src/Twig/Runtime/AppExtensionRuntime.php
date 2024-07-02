<?php

namespace App\Twig\Runtime;

use Twig\Extension\RuntimeExtensionInterface;

class AppExtensionRuntime implements RuntimeExtensionInterface {
	public function __construct(

	) {
		// Inject dependencies if needed
	}

	public function getIssLocationData() {
		return $issLocationPool->get('iss_location_data', function () use ($client): array{
			$response = $client->request('GET', 'https://api.wheretheiss.at/v1/satellites/25544');

			return $response->toArray();
		});
	}
}
