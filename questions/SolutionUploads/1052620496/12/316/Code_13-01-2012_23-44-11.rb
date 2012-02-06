
 
   input_file = File.new("SampleInput.txt", "r")
   output_file = File.new("out.txt", "w");
   number = input_file.gets();
   input_string = input_file.gets();

   $i = 0;
   $j = number.to_i;
   while $i < input_string.length do
   	while $j > 0 do 
   		output_file.print input_string[$i+$j-1];
   		$j = $j - 1;
   	end
   	output_file.print " ";
   	$j = number.to_i;
   	$i = $i+$j;
   end
 
 

    input_file.close;
    output_file.close;