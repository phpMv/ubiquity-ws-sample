<?php
namespace ws\classes\data;

class DataArrayProvider extends AbstractDataProvider {

	private $partners = [
		[
			'name' => 'Netlink',
			'details' => 'India, United States,
						  1000 to 2499 Employees',
			'image' => 'https://www.outsystems.com/_image.aspx/WIyca3m9xIfHM_FyppksIT6eEBuq9Ju1D_pXUV_DzkY=/46bae024-7a5f-41cf-b5c9-d526d15b5d58Net.png',
			'tag' => 'CERTIFIED'
		],
		[
			'name' => 'Everis',
			'details' => 'Worldwide
						 10000+ Employees',
			'image' => 'https://www.outsystems.com/_image.aspx/WIyca3m9xIfHM_FyppksIYq8JOnYBc3Owqtetb0T6GU=/cb7b4a00-e174-4630-b5e6-a847f92625ceeveris%20rgb.png',
			'tag' => 'GLOBAL'
		],
		[
			'name' => 'FPT Software Japan Co.,Ltd',
			'details' => 'Japan
						  500 to 999 Employees',
			'image' => 'https://www.outsystems.com/_image.aspx/WIyca3m9xIfHM_FyppksIa0wL5IOQdTrZM9lBKdThOw=/76235975-ebcf-4b93-9d47-20c73906cb4b0011r00002QipQzAAJ',
			'tag' => 'ELITE'
		],
		[
			'name' => 'Neosis',
			'details' => 'Netherlands, Portugal, United States
						  500 to 999 Employees',
			'image' => 'https://www.outsystems.com/_image.aspx/WIyca3m9xIfHM_FyppksIUD10T4cYqnM9wOqmqrdmDQ=/46f94186-4a92-45f3-851a-8a1fa9ec354cLogo_Noesis_RGB-01.png',
			'tag' => 'ELITE'
		],
		[
			'name' => 'ATOS',
			'details' => 'Australia, Netherlands
						  10000+ Employees',
			'image' => 'https://www.outsystems.com/_image.aspx/WIyca3m9xIfHM_FyppksIQwqdSwFkSK_GjNXXz9Blw8=/2a69cb1a-48cd-44ee-ba48-2355cf41f211AtosCapture.PNG',
			'tag' => 'CERTIFIED'
		],
		[
			'name' => 'DO iT LEAN',
			'details' => 'Portugal, United States
						  50 to 99 Employees',
			'image' => 'https://www.outsystems.com/_image.aspx/WIyca3m9xIfHM_FyppksIXHFhHsFIlSWTzfyYZ6fqGY=/9d8f2c1f-76dd-445d-be22-598c9aae4892DO%20iT%20LEAN%20logo%20RGB-05.png',
			'tag' => 'ELITE'
		]
	];

	private function asObjects($array) {
		$res = [];
		foreach ($array as $v) {
			$res[] = (object) $v;
		}
		return $res;
	}

	public function getPartners() {
		return $this->asObjects($this->partners);
	}

	public function getPartner(string $name) {
		foreach ($this->partners as $partner) {
			if ($partner['name'] === $name) {
				return (object) $partner;
			}
		}
		return null;
	}

	public function getMessages() {
		$datas = [
			[
				'title' => 'Message test',
				'content' => 'Fluctuat nec mergitur',
				'type' => 'brown',
				'icon' => 'ship'
			]
		];
		return $this->asObjects($datas);
	}

	protected function getContents() {
		return [
			'Home' => '<h1 class="ui header"><i class="ui seedling icon"></i> Lorem Ipsum</h1><hr>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus metus nisi, rhoncus at convallis a, mollis sollicitudin nunc. Quisque quis lorem vitae neque varius pulvinar. Nunc vel felis est. Donec ut diam tincidunt, porta dui sit amet, cursus erat. Quisque elementum justo id nunc ultricies, et tempus nulla consectetur. Quisque accumsan tempus pellentesque. Mauris lobortis nisi a justo blandit pellentesque. Nulla fringilla dui scelerisque, cursus nisl sed, malesuada felis. Integer imperdiet ut velit accumsan rhoncus. Nunc molestie dui sed urna auctor porttitor. Etiam sed enim sit amet ante auctor mollis. In hac habitasse platea dictumst. Aliquam non pulvinar nibh. Nam ac purus vitae sapien ultricies consectetur.

							Duis tempus sit amet nisl ut scelerisque. Ut a eros tincidunt, tempor nulla at, tristique dolor. Nulla ex massa, cursus et lobortis ac, dapibus vitae ipsum. Sed varius velit id ligula vulputate, id venenatis dui viverra. Donec sapien nisl, scelerisque et efficitur eget, finibus vel ex. Donec egestas tortor vitae feugiat aliquet. Quisque ultrices tempor vestibulum.

							Morbi nec venenatis eros. Fusce sed aliquam lectus. Sed aliquet ultrices malesuada. Nam varius, mi non interdum dignissim, leo quam volutpat sem, vel sollicitudin lacus ipsum non metus. Ut massa nibh, placerat vel neque nec, ornare mattis neque. In rutrum mi suscipit bibendum rhoncus. Nunc nec placerat turpis. Vestibulum commodo nisi et magna sodales gravida. Ut non sapien libero. Duis non lectus porta lorem porta volutpat placerat vitae eros. Vestibulum id odio quis odio eleifend tincidunt.

							Sed quis finibus nibh, dapibus pellentesque leo. Donec eget blandit enim. Quisque id orci tellus. Sed tempus dui nec semper efficitur. Etiam ac felis enim. Praesent a ultrices turpis. Pellentesque sit amet sagittis mauris, eu rhoncus dolor. Aenean tincidunt magna ut massa varius rutrum. Pellentesque facilisis magna vel luctus pretium. Nulla tempor laoreet metus, dignissim tempor orci viverra a. Nunc in lacus eu justo feugiat aliquet. Maecenas libero elit, congue sed ipsum a, gravida iaculis leo. Maecenas rhoncus, risus at fermentum mattis, mauris justo rhoncus elit, quis rutrum lectus ex in risus. Etiam dignissim interdum est, id varius turpis ullamcorper eu. Aliquam quis lectus nec purus blandit venenatis. Aenean maximus magna eget purus sollicitudin consectetur.

							Pellentesque justo quam, sodales eget dui eget, sagittis fringilla augue. Vestibulum arcu dui, aliquet vitae fermentum condimentum, convallis eget diam. Duis fringilla vitae justo a ullamcorper. Sed interdum in sem at feugiat. Duis efficitur quis velit a interdum. Curabitur sit amet rhoncus nibh, vel tincidunt massa. Phasellus sed pellentesque diam. Pellentesque quis pharetra ex, id pellentesque lectus.'
		];
	}
}

