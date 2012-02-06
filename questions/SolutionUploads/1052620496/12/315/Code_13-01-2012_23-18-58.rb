
 
   input_file = File.new("SampleInput.txt", "r")
   output_file = File.new("out.txt", "w");
   number = input_file.gets();
   input_string = input_file.gets();
   $i = 0;
   $j = 0;
   while $i < input_string.length  do
   	while $j < number.to_i do 
   		output_file.print input_string[$i];
   		$i = $i+1;
   		$j = $j + 1;
   	end
   	$j = 0;
   	output_file.print " ";
   end
 
 

    input_file.close;
    output_file.close;