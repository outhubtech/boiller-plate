	public static function genUniqueID($chartype=0,$numchar=6,$idtype=0,$case=1,$separator='-') {
		/*
		#	Can't generate less than 6 characters, else generates 8; Max=32
		#	$chartype(numeric=0, alphanumeric=1, alhpa+numeric=2, numeric+alpha=3, number+2alpha=4, alpha=5)
		#	$case(lowercase=0 or null, and uppercase=1)
		#	$idtype (normal=0, idV4=1, idV5=2, idV6=3)
		*/
		if (!isset($separator) || $separator=="" || empty($separator)) {
			$separator = "-";
		}

		if($numchar==null || empty($numchar) || $numchar<4 || $numchar>32 || !is_numeric($numchar)) {
			$numchar=6;
			if ($numchar>32) {
				$numchar=32;
			}
		}

		if($case==null || empty($case) || !is_numeric($case)) {
			$case=1; //default case is numeric 1 (uppercase)
		}

		$num = substr(str_shuffle('123456789009876543211357908642097531246805253479943253753'), 0, 30) . substr(str_shuffle(time()), 0, 10).rand(100,9999999);

		$alpha = strtolower(substr(str_shuffle('abcdefghlmnopqrsijklmnopqrstuvwxyzacegikmlmnopqrsoqsuwyzxvtrpnljhfdb'), 0, 32));

		$alphanum = strtolower(substr(str_shuffle('0987654321apple11357908ballcat456789dogfishe53aleiskels853safjfjffhf8585725758583gggoathuginkjugkettlelampmannigeriaorange1234567890who456789epaulquaranr456789amsingingta0a1b2c3d4e5f6g7h8j9k0m1n2p3q4r5s6t7u8v9w0x9y8z1yourinatevivienwasiuxylophoneyahoozachariah1234567890'), 0, 80));

		switch ($idtype) 
		{ 
			case 1:
				//idV4
				switch ($chartype) {
					case 1:
						# alphanumeric shuffled
						$gen = substr(str_shuffle($alphanum),0,3) . $separator . substr(str_shuffle($alphanum),0,3) . $separator . substr(str_shuffle($alphanum),0,3) . $separator . substr(str_shuffle($alphanum),0,3);
						break;
					case 2:
						# alpha+number

						$gen=substr(str_shuffle($alpha),0,1) . substr(str_shuffle($num),0,2) . $separator . substr(str_shuffle($alpha),0,1) . substr(str_shuffle($num),0,2) . $separator . substr(str_shuffle($alpha),0,1) . substr(str_shuffle($num),0,2) . $separator . substr(str_shuffle($alpha),0,1) . substr(str_shuffle($num),0,2);

						break;
					case 3:
						# number+alpha
						$gen=substr(str_shuffle($num),0,2) . substr(str_shuffle($alpha),0,1) . $separator . substr(str_shuffle($num),0,2) . substr(str_shuffle($alpha),0,1) . $separator . substr(str_shuffle($num),0,2) . substr(str_shuffle($alpha),0,1) . $separator .substr(str_shuffle($num),0,2) . substr(str_shuffle($alpha),0,1);

						break;
					case 4:
						# number + 2 alpha - special
						$gen=substr(str_shuffle($num),0,1) . substr(str_shuffle($alpha),0,2) . $separator . substr(str_shuffle($num),0,1) . substr(str_shuffle($alpha),0,2) . $separator . substr(str_shuffle($num),0,1) . substr(str_shuffle($alpha),0,2) . $separator . substr(str_shuffle($num),0,1) . substr(str_shuffle($alpha),0,2);
						break;
					case 5:
						# alpha shuffled
						$gen = substr(str_shuffle($alpha),0,3) . $separator . substr(str_shuffle($alpha),0,3) . $separator . substr(str_shuffle($alpha),0,3) . $separator . substr(str_shuffle($alpha),0,3);
						break;
					default:
						# number
						$gen = substr(str_shuffle($num),0,3) . $separator . substr(str_shuffle($num),0,3) . $separator . substr(str_shuffle($num),0,3) . $separator . substr(str_shuffle($num),0,3);
						break;
				}
				break;
			case 2:
				# idV5
				switch ($chartype) {

					case 1:
						# alphanumeric shuffled
						$gen = substr(str_shuffle($alphanum),0,4) . $separator . substr(str_shuffle($alphanum),0,4) . $separator . substr(str_shuffle($alphanum),0,4) . $separator . substr(str_shuffle($alphanum),0,4);
						break;
					case 2:
						# alpha+number
						$gen=substr(str_shuffle($alpha),0,1) . substr(str_shuffle($num),0,3) . $separator . substr(str_shuffle($alpha),0,1) . substr(str_shuffle($num),0,3) . $separator . substr(str_shuffle($alpha),0,1) . substr(str_shuffle($num),0,3) . $separator . substr(str_shuffle($alpha),0,1) . substr(str_shuffle($num),0,3);
						break;
					case 3:
						# number+alpha
						$gen=substr(str_shuffle($num),0,1) . substr(str_shuffle($alpha),0,3) . $separator . substr(str_shuffle($num),0,1) . substr(str_shuffle($alpha),0,3) . $separator . substr(str_shuffle($num),0,1) . substr(str_shuffle($alpha),0,3) . $separator .substr(str_shuffle($num),0,1) . substr(str_shuffle($alpha),0,3);
						break;
					case 4:
						# number + 2 alpha - special
						$gen=substr(str_shuffle($num),0,2) . substr(str_shuffle($alpha),0,2) . $separator . substr(str_shuffle($num),0,2) . substr(str_shuffle($alpha),0,2) . $separator . substr(str_shuffle($num),0,2) . substr(str_shuffle($alpha),0,2) . $separator . substr(str_shuffle($num),0,2) . substr(str_shuffle($alpha),0,2);
						break;
					case 5:
						# alpha shuffled
						$gen = substr(str_shuffle($alpha),0,4) . $separator . substr(str_shuffle($alpha),0,4) . $separator . substr(str_shuffle($alpha),0,4) . $separator . substr(str_shuffle($alpha),0,4);
						break;
					default:
						# number
						$gen = substr(str_shuffle($num),0,4) . $separator . substr(str_shuffle($num),0,4) . $separator . substr(str_shuffle($num),0,4) . $separator . substr(str_shuffle($num),0,4);
						break;
				}
				break;
			case 3:
				# idV6
				switch ($chartype) {
					case 1:
						# alphanumeric shuffled
						$gen = substr(str_shuffle($alphanum),0,4) . $separator . substr(str_shuffle($alphanum),0,4) . $separator . substr(str_shuffle($alphanum),0,4) . $separator . substr(str_shuffle($alphanum),0,4) . $separator . substr(str_shuffle($alphanum),0,4) . $separator . substr(str_shuffle($alphanum),0,4) . $separator . substr(str_shuffle($alphanum),0,4) . $separator . substr(str_shuffle($alphanum),0,4);
						break;
					case 2:
						# alpha+number
						$gen=substr(str_shuffle($alpha),0,1) . substr(str_shuffle($num),0,3) . $separator . substr(str_shuffle($alpha),0,1) . substr(str_shuffle($num),0,3) . $separator . substr(str_shuffle($alpha),0,1) . substr(str_shuffle($num),0,3) . $separator . substr(str_shuffle($alpha),0,1) . substr(str_shuffle($num),0,3) . $separator . substr(str_shuffle($alpha),0,1) . substr(str_shuffle($num),0,3) . $separator . substr(str_shuffle($alpha),0,1) . substr(str_shuffle($num),0,3) . $separator . substr(str_shuffle($alpha),0,1) . substr(str_shuffle($num),0,3) . $separator . substr(str_shuffle($alpha),0,1) . substr(str_shuffle($num),0,3);
						break;
					case 3:
						# number+alpha
						$gen=substr(str_shuffle($num),0,1) . substr(str_shuffle($alpha),0,3) . $separator . substr(str_shuffle($num),0,1) . substr(str_shuffle($alpha),0,3) . $separator . substr(str_shuffle($num),0,1) . substr(str_shuffle($alpha),0,3) . $separator .substr(str_shuffle($num),0,1) . substr(str_shuffle($alpha),0,3) . $separator . substr(str_shuffle($num),0,1) . substr(str_shuffle($alpha),0,3) . $separator . substr(str_shuffle($num),0,1) . substr(str_shuffle($alpha),0,3) . $separator . substr(str_shuffle($num),0,1) . substr(str_shuffle($alpha),0,3) . $separator .substr(str_shuffle($num),0,1) . substr(str_shuffle($alpha),0,3);
						break;
					case 4:
						# number + 2 alpha - special
						$gen=substr(str_shuffle($num),0,2) . substr(str_shuffle($alpha),0,2) . $separator . substr(str_shuffle($num),0,2) . substr(str_shuffle($alpha),0,2) . $separator . substr(str_shuffle($num),0,2) . substr(str_shuffle($alpha),0,2) . $separator . substr(str_shuffle($num),0,2) . substr(str_shuffle($alpha),0,2) . $separator . substr(str_shuffle($num),0,2) . substr(str_shuffle($alpha),0,2) . $separator . substr(str_shuffle($num),0,2) . substr(str_shuffle($alpha),0,2) . $separator . substr(str_shuffle($num),0,2) . substr(str_shuffle($alpha),0,2) . $separator . substr(str_shuffle($num),0,2) . substr(str_shuffle($alpha),0,2);
						break;
					case 5:
						# alpha shuffled
						$gen = substr(str_shuffle($alpha),0,4) . $separator . substr(str_shuffle($alpha),0,4) . $separator . substr(str_shuffle($alpha),0,4) . $separator . substr(str_shuffle($alpha),0,4) . $separator . substr(str_shuffle($alpha),0,4) . $separator . substr(str_shuffle($alpha),0,4) . $separator . substr(str_shuffle($alpha),0,4) . $separator . substr(str_shuffle($alpha),0,4);
						break;
					default:
						# number
						$gen = substr(str_shuffle($num),0,4) . $separator . substr(str_shuffle($num),0,4) . $separator . substr(str_shuffle($num),0,4) . $separator . substr(str_shuffle($num),0,4) . $separator . substr(str_shuffle($num),0,4) . $separator . substr(str_shuffle($num),0,4) . $separator . substr(str_shuffle($num),0,4) . $separator . substr(str_shuffle($num),0,4);
						break;
				}
				break;
			default:
				# normal
				# only here I need $numchar to work
				switch ($chartype) {
					case 1:
						# alphanumeric shuffled
						$gen = substr(str_shuffle($alphanum),0,$numchar);
						break;
					case 2:
						# alpha+number
						$gen=substr(str_shuffle($alpha),0,$numchar-ceil($numchar/2)) . substr(str_shuffle($num),0,ceil($numchar/2));
						break;
					case 3:
						# number+alpha
						$gen=substr(str_shuffle($num),0,$numchar-ceil($numchar/3)) . substr(str_shuffle($alpha),0,ceil($numchar/3));
						break;
					case 4:
						# number + 2 alpha - special
						$gen=substr(str_shuffle($num),0,$numchar-2) . substr(str_shuffle($alpha),0,2);
						break;
					case 5:
						# alpha
						$gen=substr(str_shuffle($alpha),0,$numchar);
						break;
					default:
						# number
						$gen=substr(str_shuffle($num),0,$numchar);
						break;
				}
		}
		#check and covert if $case is upper
		if ($case==1) {
			$gen=strtoupper($gen);
		}

		# now, return the generated value
		return $gen;
	}
//Ending

			if ($case==1) {
			$gen=strtoupper($gen);
		}

