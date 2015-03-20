<?php namespace EliuFlorez\Twitter\Factories;

use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterFactory
{
    /**
     * Make a new Twitter client.
     *
     * @param array $config
     * @return Twitter
     */
    public function make(array $config)
    {
        $config = $this->getConfig($config);

		if ($config['access_token'] && $config['access_token_secret'])
		{
			return new TwitterOAuth(
				$config['consumer_key'],
				$config['consumer_secret'],
				$config['access_token'],
				$config['access_token_secret'
			]);
		}

		return new TwitterOAuth(
			$config['consumer_key'],
			$config['consumer_secret'
		]);
	}

    /**
     * Get the configuration data.
     *
     * @param string[] $config
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
	protected function getConfig(array $config)
	{
		if ( ! array_key_exists('consumer_key', $config)) {
			throw new \InvalidArgumentException('The Twitter client requires authentication.');
		}

		return array_only($config, ['consumer_key', 'consumer_secret', 'access_token', 'access_token_secret']);
	}
}
