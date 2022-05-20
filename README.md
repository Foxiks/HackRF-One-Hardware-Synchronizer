# HackRF-One-Hardware-Synchronizer
## Simple HackRF One Hardware Synchronizer [based on hackrf_transfer]

![1](https://github.com/Foxiks/HackRF-One-Hardware-Synchronizer/blob/main/images/12.png)

This program is a handy GUI launcher for launching hackrf_transfer and hardware synchronization of two HackRF ONEs with each other. This program has a special frequency calculator for convenient merging of records from two hackrfs into one large frequency band!

For the utility to work successfully, you must:
- [Java 8](https://www.java.com/ru/download/)
- [GNU Radio](https://www.gnuradio.org)
- [PothosSDR](https://downloads.myriadrf.org/builds/PothosSDR/)
## Installation
In order to install hackrf_transfer on your Windows system, you need to install the [PothosSDR](https://downloads.myriadrf.org/builds/PothosSDR/) package, which carries hackrf_tools. Please note that you need to add this to the system PATH during installation!

After you install it, run the program and press Get S/N. In return you will get a cmd window with some information about libhackrf and information about your Hackrf. The serial number of your hackrf will be listed there. Copy the S/N values ​​into the S/N fields in the program. Please note that the very first hackrf in this list will be set as the main hackrf in the system.
Specify the serial number of the first HackRF in the list in the S/N field for hackrf board 1. And transfer the serial number of the next Hackrf in the list to the S/N field for hackrf board 2. Then you can specify the parameters for your Hackrf (gain, amplifier on).
Next, specify the center frequency of reception. This is the Center Freq. Specify in Hz! The Samplerate parameter must be the same for both Hackrf! Parameter Cutoff Freq. don't change. I'll talk about this option a little later. Then press the Calculate button and the program will offer frequencies for Hackrf so that when merging records from two Hackrfs, the Center Freq value will be in the center of the spectrum!

## HackRF board hardware connection

Next you need to connect the Hackrf boards together. Do it like this:

![2](https://i0.wp.com/olegkutkov.me/wp-content/uploads/2020/06/HackRF-One-boards_clock_sync.jpeg?ssl=1)

 
I took this photo from [this](https://olegkutkov.me/2020/06/17/combining-two-hackrf-sdr-to-see-more/) article.
Please note that the Main board is the topmost hackrf board that was listed in the CMD list with serial numbers!

Next, connect the GPIO lines of your Hackrf boards as shown in this picture. This is a group of contacts under the designation P20 on the board:

![3](https://i0.wp.com/olegkutkov.me/wp-content/uploads/2020/06/HackRF-One-sync.jpeg?ssl=1)

 
I took this photo from [this](https://olegkutkov.me/2020/06/17/combining-two-hackrf-sdr-to-see-more/) article.

Then you can select the data recording mode (wav or raw) and start receiving data.
If you've done everything right, you'll notice all the LEDs on your SDR boards (RX and TX) light up. And in the CMD that opens, you will see how the data transfer process began.
![4](https://github.com/Foxiks/HackRF-One-Hardware-Synchronizer/blob/main/images/9vbl.jpg)
![5](https://github.com/Foxiks/HackRF-One-Hardware-Synchronizer/blob/main/images/Mp3.jpg)

To stop receiving, press the combination Ctrl + C directly in the CMD window!

## Combining received records into one frequency band
To connect recordings Select my GNURadio GRC script and in the input files specify your recordings, and in the output file specify the file where the I / Q data with the frequency band of both Hackrf will be saved. Please note that the CropBW and Samp Rate parameters in GRC must be the same as those selected in the launcher.

As a result, you will get a large spectrum of frequencies using two HackRFs:
![6](https://sun9-84.userapi.com/s/v1/if2/5GbQAZP28_jQ1eeyFsbNqy7Ofgtr3wbSRgj0I-l8_P0HW7e6sEDsYNNZ_X0ptkKem0KyjfnkhySunQMfZGE_KgzC.jpg?size=1920x1032&quality=96&type=album)

Such a signal received from two Hackrfs will allow you to receive analog stations in a large frequency band, but unfortunately, even this method of synchronizing Hackrf boards has an error of several samples, which is completely unsuitable for demodulating digital signals that will be in the reception band of both receivers.

## About the CropBW parameter

If you change the cropBW parameter to 0, you will get a dip in the middle of the spectrum. To avoid this, you need to shift the spectrum. Leave CropBW at 1.5M or increase it if that's not enough. This will shift the spectra to the center and the dip will disappear, but the overall band will decrease slightly.

![6](https://sun9-85.userapi.com/s/v1/if2/a398HdLLO-W6V-h4st699ve-eLmTVL2CPjniIm3QP7srGZnyDdFsaAHpOGk9kMmBQSlTag0cLu81zmXo3jxT43WV.jpg?size=1920x1032&quality=96&type=album)
