<template>
    <div>
    <img width="150" height="150" style="float:left;" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMTEhUTEhMWFRUXGB4bGRgYGRoaGhoaGRsbGB4ZHxgYHSggGx4mGx0YITEhJSkrLi4uGB8zODMsNygtLisBCgoKDg0OGhAQGy0lICUtLS0tLy0tLS0tLS0tLS0tLy0tLy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIAK8BIAMBIgACEQEDEQH/xAAcAAEAAgMBAQEAAAAAAAAAAAAABAUDBgcCAQj/xABAEAABAwIDBQUGBAQFBAMAAAABAAIRAyEEEjEFQVFhcQYTIoGRBzJCobHBFCNS0UNi8PEVM3KC4SRTktKisrP/xAAYAQEAAwEAAAAAAAAAAAAAAAAAAQIDBP/EACARAQEAAgMBAQEBAQEAAAAAAAABAhEDITESE0FRgSL/2gAMAwEAAhEDEQA/AO4oiICIiAiIgIiICIiAiIgIiICIiAtcwPa+jVxlXC0yCKTMz6kgNzTGQcYEkndZUXtP7Z/h6bsPh3fnuEOP/bad54ErjIpONFwmKepJMZydSeI5LPLOReYWzb9RUKzXtDmODmnQgyD5rIuAdj+2WJwLWUgGnD55LS3xAO1ymbb7Lt+yNtUMSCaFQPjWNRPEFXmUqtmlgiIpQIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAte7ZdoRhKMNINapam0nfveeDWi5PQb1L7S9oqGBourYh0NGjR7zjwaN5XA9tdpalbNXrO/PxFmt1FGjPuj995k8lnyZ6nS+GO6+46oKtQy8uY29Rx96pUOt+HPgveHok/m1RYCadPRv+o8Bpf0BJAUHZbhItI3N+pPLiVYuxN5mXG4ncBo4j/wCrf7rj3XX08bQgfmPMu+FvDlHHrMb7qRszE16H5jXmk46Bpi2t+PReaNFrCXu8dU6fy8zzPAf8rBWrQ+5Lqp91o0HVXwzZ5Yu3dk+1FPFty3bVYBnabTuzN4iVsK/OmHr1KDw5jnMrifEHaTxGkcl17sf21Zih3dXLTrCPDNncxbju5rqxzlc9mm2oiK6oiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIqbtF2owmCYX4ms1nBur3cgwXK5jtj23ZpGDoZROUOre9JAv3bDAHVx00QdnUPG7UoUv82tTZ/qc0H0JX5x2j212hiMwfjKgcJLms8DC0boZG6+qpXOzOqis10Fpc1zjJkCzgTvmLIP0Zi/aDs6mSDiWuI3NBJ+ioNq+17CNpudh2VKrhxGUDmZvC4vSwj3ukgMrNIy8C0gCDxtcFfKlN+UBoIez/MG8iZUbi0j72s7SYjH1hVqnM34Wt0aNcoHlPOFUNxJLs75k6dNwE+in4+kAczCO7zCeTo+kysJohznOcRkJcGcJF9NypZFpdJDcfmGRpEn3nbgBu6DhvVjQrF1wS1jfeedSTw4vOgG5UOKwFQFwiIEmNCOIAXovqQwXyggeHdNiYJ949VlePrppM21YPGSCW2AOWTeCfhbPvPOpO5SqRDLU4712rtzRvg/UrVG7QhwBGVtOzWgwdePE73K2wuLm7jrujXhPLgN6yuNi8u122kCCylc+8+od2+b7v65r6w5Hju5AbfNpJG+VjoYgTkMwLloieMl291p4NXzEYsOcCRYe6wSL3gm0k8Br0UY5apcenS+yXbsOilinHOXQ18QL6A8Oq39fnYPAs4Fzz8Ii3U3+5XQvZ52pj/psQ9o303E+rCSfT04Lrwy258sXR0RFooIiICIiAiIgIiICIiAiIgIiICItF9oPtHo7PaWMiriI9wGzebufJBtW29s0cLSNWu8MaOOp5AbyuL9rva5iKzH/gx3NMOylx98g7/5VoO2e0OJxj3Vq1Rzib5SfCwZtw0AsF9w9B0NcS1tJzifPTzKrctLTHbFiy+rWdLi+pUAfLyXOc6DYuN/7r1haDqtSWgRADxwO88lbbMpOzVHFrXVAD3fAvtlAPAibclLdg30aLcjMtWpSh36oBbLzzEkHpyWWXLtrMJFFs2g5zXPAF5ZJ0k2lWX+COdhHU6hDa3eNDGk74Oh5hWeC2ZTe92GBglrHgtH8Tg4cLD1WYYFtetTeHtacOAHybAuJBJ45QVS5o12iu2f3j6Qpvl1JoLxv1NhzAlfcrX4l+KafyW+Fx6CJ81YNosok41hPd1XubcXk+6OhF5Uins1tKk/COe0d7lDJ0M+LN9ll9r/AC138JTp0TYuFepLR+kC5n5R1WD/AAkBgw8HMHZp0sdPkfktzGzm1W9yCM+GBc5pG8+80HiGiQo1TFUnZ8SAe6Dgxoi8AQx3mQfVP0pMWmV8K4klky1pDuED7ws1PAteWuk0w8aj9YIgx5rY8dhDSyU3C9e4cBucZdb6LGcCH1DTHh7i/Ix73y06JOWp+GtYnBTJdHh8L41BBjN0NlGOGfSbmBudJvO63NbWcKD3rw21dxa22m4HzAJWPF7PzBlFoAew5p3Ru53Vpzf6pcbGr0ca5nhPh/VOpjlw3/urnD4xsANOtp+Ly67ymNDSKlR9MHM3K2LkObYeZP0Ve/Z2UN7tzg8A52n4Yj6qdY5eJmVnq+a/4W+YGp6lMTQAEEi/wi59FrWDqvbeTB05nqrTC4xps50GJIFhxu7+uqd4p6rqXYDtg5rm4XEuLmkAU6hjwwLMdy3SunBfn/ZmycTUALaFRzToWscR/wCREfNdn7J0sQzDMbibPFheSG7gSLSunDLbHLHS5REV1BFixOJZTaX1HBrRqXGB6laXtn2jUmy3DNNQ7nmzJ5b3KLlJ6tjjcvG7VqrWgucQ0DeTAWr7U9oGCoyGvNZw3UxP/wAtAub7ZxmIxJzYio4tPwzAtyG6f6CiOwbWtGjfl6N1Kz/TfjX8detk2t7T8S4xQpMpt41Jc7rAIA9VTVO3mN1/FEHgGMj6LWMZSLj4Q7mT/wAkLPgcJJaxjcznEAAcTyVordTyOr+zHtHisZ33flrmMgNcBBzHUHdpC3xVPZjYrMJQbSaBm1eRvcdSrZXZ0RERAsdes1jS57g1oEkkwAOq1rtr27wmzmE1X5qpHhpNu4nn+kcyvz/2k7a4/bFTuZyUyZFFhhtt7jq7z9E2N89ontoAzUNmGTo7EEWG6GNIuf5jbhK4qKr3uL3lznSSXG5PGSdf+VPGyu5h1aQDOW2sWnorLZuB745WM8bjDDmGVvGRvMLK8kaTBVMiSG3DxHSFeYB4rM7omDSGZhOgdqQRvkb1k2p2Rr0R4nBzTfhffCgbPeXPbTAu8Fro3RosfqZTqtNa9WlPOSS9vjAa6mdJtl00vJPKFsVUl9dtUjN3jcpM+4Y8TRycbwqvBeFtN48RZU7t3KYcB0sVd4aiwis0hzCD3gJ4ySIHDL9Vnat6x0zTpUhVIf8AiGPLTuMm1+QMFeWd1SFQZnf9TTiCLgvlrp5A381IZSzVjUc4mm8HKNxMZTPOYXzD4WKJq1G+JhFvigOGZnpJ8k10rpi/EF9NuHt+W7M5sCM1OQG+d/kvtWuKpGJcTFMZRbduMddy+4yh3QY9ovXzA8ib5hxsSpJwJynDtd4bG/QET5qul4w/jXUQMS15D8RmBB/VZvSMpHovL8I1h/Bguc0uadbhoaHAxxkgeSVC6pSLyCG0dABxIBM+nolWm6KeIk948kSOltOEfNQPlSsw+/LhQbB5km4+SyNLGMDoHeV2wQJiC4g6R8NvNfG4QCp3cHxAOM6nUmVF7sGk55OUsc3J0LoPXWfJV1ana2NOmHtoN+FpeAbiYOQHnEnzUWriQD32UQRAAuQQIAPLnKjOrEOY4GC8EGfegRB6mfkvNYODTRFw05jbhcCVPxf6rb/iL3ZINHLec5IjQCbeS8V8S90vawxUGRsi5AHLkVNqYqoB30XcMgEaDLAPMxKi02ubFN05ackc5A18hC0mNiqA7DOLh4I7oAubuNo+ilbAxhweMbXdSa8sMtY7eDaWmDDhuO7nopNYFzSW2zujoOHoFkxGFlxdrDNeEXmeqvM7L2jTsvZ3tnhcWAGPyVN9N/hcDvF7HyWwgr88imHtaXAkkeIjdwJ56q7wzMTTJbRxFRsCS0uJGm7gtpzT+qXjrthK0jth2/ZhyaWGaK1YWJn8th5kGXHkPULR69PGv9/FVX03DTMW+Rywo7dghmekR4pkXkaTZRnzT+L8XF9Xtgx21a+Kfnr1M5Gm5jeTWi3nc81np0g2MoJO/eepJ0UTCscDl01vvifkrWjQMbhzP/qNfNY/W668p8zTwzDnUkDpczwv9LLzXowPCy/6nmfl/dSnUGxJfUceDBljzUR1On+hwJ/U7MVpjNsMslTi8PUnM58cgGj5kGVv/su7MwfxdQW0pgx0LrfJavsfYTsViWUgIbq86Q0an6ALt2HoNY1rGANa0QANABuW8jnyrIiIrKMWJxDabHPqODWNBLnOMAAXJJOgXF+3HtqaSaOzujq7hp/oabnqV17b2AGIw1agRIqU3MN495pGu5cO2D2No5xQr0QKoGtwHEatIOjuY1WefJMV8MLk07YHZTFbSeaz6hhzjL3yXOi5IB13eZVtsvYOBdihhaFWoKwBio02LhIIPORpAW97e2PVomlXwJAySO5cYacwykA7jMHqFRbLYKVc1qOzagxTpu6zA4i51IiZ0XP+uV9bzDCTppG0XVH5KdTWi5zJ4w6Pmuq9l+zFKnTbUNOQ5otvjp8/Ja1tLs85lOXHNU8VSoY1cTmMcpsuh9mKL30GQQMu7+uSx5LldSJw1PUTaexmObEy0CANVzvbWy2YeoXssQMxEzIGoG/RdWxuIDc023Hgf6+65btvFh9ZupzFzTJkgXCz4/ev+r5sWEwmWlUNEloLi7iCTa07wCT5K7wVZ3eUg5udoblLjAzQTeOFyqzs+Q/D9y2AYJJvaDAWz4PBtNOllbZ0nM7Sd8DgAt5tSKfFVKZcWtMU6Tp4b4t0EKwwmKa57qjj+UZIb+qRGnE/dS6+yGVHOAjJckcbb/25rGNj03hhILG0j4Q06ToTx0hLUyRG7v8AJf3jW5mANpieBEyPqeASo004LSHVKg8W/KdxG7RXQ2Uw1TVLiA4DK0G2mUfRYDsN4pFjavikEEt90aFRoiqaxxD6eXKwe9JF7THkZPOFgZVIpNeRBbGUDQzqeSuMTslwNMNe0xGeRYu976Tqo9PBHvKl2925pyTqSd1tLiZVdVNiLjmvBpP0dUsSDMbtfkolXAHvKrSSW0gSL2BaJE8eCt/wlc02Ex3gMAA2jjMarP8A4dU75gaxsOa0vJ4gnXjulTNxSxrtXDPaxtacxJAEjceXLWV4a6o2p3ZcPzLk8jqFsVfBPd3gyDKCe7M2NzB+3RVuJ2fWDKbxT/MLoIJFhxstJdmkTD4e1QOd/l3YBvIMX6iy+V6BdkItmMEDgAIHoNeasqOEcKwbkBpFodUvcHh91DwYquY4uYA5vhpkTNjIMbiRBKtIrUYYI949pnKNANxhZ37PIpRJLifUDUdNPRT6+FrHuw0tzfH0Oim4WkRWNRzgaYHuxrbxdJT5RtFfSAB8MOe0Ajg4WMnTQL6zEgsc4mCSGgbxuKzUdn1BTLc8OPADcZIj1XjE0AHNcHNgCHW1nekwXlTnktdTaNCCSNTB5cwvm0crmVPdzSA0zcEfTT6qvw9NzfC9/ieYaRuB363gfsveIoEMp5qkPDjmsLjnwkqtw6aY62psUMtXM087fPXcpLmPdHiPWTf0XzGUxN7a2jdu6hZPxJcQCbD/AE8OYVY6MvNsZoZRcA9Q76gwsTKJJ9z0n6kq0pZgJBPkyn9YXrFtJbLnGOBbTH0K6MHFnltt3szwcU6tUxLn5RvhrRp6krdVpvsvxDXYZ7QQS2oZ8wCNFuS2jnvoiIpQKl27sJtYFzbVOPGNOh5q6RRZLNVMtl3HPXUIzMqXDhN9Q4GD9lVPxjqRcwVDlixJ3cDzC6HtrZIrAFpy1G6O+xWo1sMabstWmJP6hB5wRId1C4ssc+O9dx0Y/Gfd9UeLr95TcWzcZS6In+5VjsWu6mwt3tPytEqwZhaRM1Hsa0XDQPmSdV5fhqZfmpvzA2dAMQL6jU7ly8lyyu/G8uMQcQ19ZzmssDq4iw3RzMKjxPZ+lReCSXOEuc46AAcOZW518UxjdQOB4k33ankJVU3AOqBz3jw6hpsXuGhdwaNzUl1NYoxxtu655sOoG97SJDBlcXGb2M5ehXQsMWVmsAju2zF4BI+25a3iuwtOoXVRUqF7rkTlbPINVNi9n4mkzI2rXyibCo4D/wDNdeFmlc+LLG7dKGHBeT8MC242X1jQGOBsBBAjUggQuNvx2MbpiKzTuzVB/wAL3h9t7SF24gkTo6HX6FOqpux2cUxkY8jlHCDOq9vo+9Grgf3hc42V29xYOXE0W1Wj/t+Fwj+UmD8l0DY+Np4hjqlN8tOkiHNMXBB0VbDZWotOVuQgG56wftPqvjcM0Oa4jxH3Wxpc71OyOMHS4+mvoDZfMkPBBJdF+Vzf7QoNobMABOkn1tvXmph5ADTAvfSbyfJT2scC7e69zHyiV5dS8Iucskkm17DyskQiVsKHOJEwDoOMXtw1UFtFzpJNt0clets4wCLNv8RAaBeb3hV9VsE85twBVpuio2hhSA2+tifQxPSVHdhz3maTljw8yPCfsrLGe6wGIB15kaW3LA1svZcQJ9f6haxFkYMHhi2ZMuJueEfZShhgGmbHUfssjKRlxEG2m/yWejSuJ3XJ5f0FKKrqzhmEHW3LTX0CqqrbupEzBnN9FtIwDclrmfS+nos7dhMqhrhTcQN8e966hPvfhLJ60auXHxFrj3dhz1k/dSW0nOcHPN3CXTFo5Ldm7GeHl3dOMg2sAPU3WiY+qylLD4HA3za2EEQbzy5KmWVb8fzb0itrOc8mbzbl/cKwpd4YjL8tdwuFUU8aJ0LvlI6K42Ri2n+U879LH91n3t0Z6091MVUaAC1vUtH2VbtXGsIuac8pV7XfE6OPBoLT1yyJ+aqcRiqZ1kdWW9QPutsK48o9dmtv/g6zXtLCx1qjWnUbiOY/ddmwOMZWY2pTcHNcJBC4U9wcTka0+ca/7jCvOxfaF+DqZamXuHnxgGS136h910SufKOwIvNKoHAOaQQRII0IK9KVRERAXitRa8ZXAOHAiV7RBre0+zpu6if9hNj0P7qkptdOXuWtcP1ST6Tey39RsXgWVLuHiGjhqFz8nBL3HRx82usptqeH2SB4jLid+/y4dAplNrWi5InTkrI4J7eDhy1josVfD5mlpBHPgsvj5mtLfpu9qutRGaxEEXjjuKrNpYFrhJA6wJ9SrN9FzCQ4W3HisNdwgiYnToVTXbouX/nUu2gbW2UADDSTINgDy0CqsXsxsgHK2RcuY5thxI5rom0MO0gEEQN/91rWNwDmh5a8tnTxSNOB80rK2NRGzCahgwOIJi/zXSfZxhhTw9QvJMuMA8BaVS7J7OVXgF8hu8DV/QbhzW74PC93Ta0NAEAR+wVv4y2kPZ4AAbTeeEG6VfetuaPSSVmpQSGi5Gp3L5VYxs6kkGwv/ZNH08UKQIdlJ68br2+nZo0A+v7LGxxDQJlzjoNApRbcA3cfQXUolYHgZ7cAOqjVMIQHk3O7krBrgCZMkTB5LA4hzSGhxGpMR5CdVMuvD6UeJw/hDAYk6xqQD+6xV8GJaJ0vA+X0VyaMhoi4+G3rKh1W+N2kN1PC1+qna30x0MNJcdCRfgFKquawZnWYxoJPHWeqju2i1lNpiROggkjjG4aLFXBqjO/xt/SNBFwI3qN7Z2pmzcWA91R9MOJMsBd7oiNOP0V3hu0bC4NeC0kxOoWqZWkSwxwBE7tFiLp3XHAkg+RuFpM9eIuLpaj43A0qoy1abHjg5oOvCdFlpe6OgXtdDNzrtF7MmHx4J3dOH8NxJYehN2rWjgsRQEYug5sT42jMwjiSNOtl2pfHNBEESOazy45WuPNlPXEm45ke9bycPX7EKNVqjgYO8XHzkekLqG2+wuExBLshpVD8dPwmeJGh8wtFx/s72hRdNCrTrsnQ+B/oZafUKn52L/pK1+o1rtSfp8rqPVoUxuHmLqZtCnUpT+Jo1aBFszmHu+neDw3jiopLXCWva4Ruv5q0ukWbbz7Nu1Qa4YOoTlP+W46A/o/ZdOX54wIfTc1zSCWuBGs2Mr9CUnS0E7wFpGNj2iIpQIiICIiAsdSi12oWREFfV2WLlriDz8Q9LGPNV+L2U7L/AJbahn4SGcpWwIs8uLGrTKxqWJ2MwEHunXMfEQLamCvTdnMYJbRDpmbcpALjoLEea2tFT8Z/qfuue/43UMhtHf4jmEj+UDdAtfgVIqbX0zU6joMkQ3duFxbiVI7WUu4rsriAyr4H8qgBLXHqBB6Diq/FVZbmBi0rO46yWmrGfDbXD3z4m/ywZO6IA01JPPkpTaroDcslxkhoOnNxFlQPqWOYecZoneRw5hSsPtAtAs4DQPpucWn0Nk1CSroVjIGRwjWA6PWLpQxBIJFGpbRoaZMcTG/qo+x+0Fb8Qyk5wqMf/wCTbfTqt0Wk4cbFLbK1d1Ko9gayjUubh3gFzJJJ15AclJq4CscuVsR/MAB6Zp85V+it+OKNtfGx6pc45mMBAGhcTrNxljWLLU+32AxOEoGvSyVaQP5jIcMgMAODcxDufDXjHTF4q0w4FrgCCIINwQd0KfyxNuGdlMRUMuJvrxBadNfrqFtzXic9PQxmZw6cuWh1BCpe0WwKmAxGanbDvd+W79BP8M8juWfZmNbUBcw5S0w5u9p4EHcdfosPLqtutLRzw6HabpH0/wCCslKmdTBG8b1Fpua64s46xv8AI6qVh2vMAmxIE7witdBp6DovS+MFgvq62QiIgIiIPjmg2IkKmxvZLA1TL8LRJ4hgafVsFXSIba7g+w+z6TxUZhmhzTIOZ5gjfDnELYkRAREQEREBERAREQEREBERBX7d2W3E0H0nWzCx4OFwfVcxwWIfmdRqwKjXEQdM4EEdHCD5rry0jt5sO4xVMAWirGsfDU/2n5FZ8mO5tbG/xQ4Z/utnJr3Tz8JGtJw6r6HhhI/yKpJt8Dum4+Sj1Kssc9zcw0rMGoI0qtOoPPoV5xeLcQG1Yc2AWVIs4c/0n+rLKTbSVf8AY9neYrNaWNMxzsFv6072d4WG1KhF3OgE8B15rcV0Txll6IiKUCIiCLtPAU69J9KqMzHiCPuOBXH9s7JfhcRkktq/wnmzK7AR4TuzgG/rou1KBtvY9HFUnUa7MzT5Oaf1NcLtcOIVM8PqLY3TkuF2ix5yu/LqTDmOsZ1MHz/rVbDs18uY0mQSBJ1g8wrrs72VfhK5OZtam9mVz3NaH+H3cwAg2kEjW1grgdnMOH5wwgzMBzg2dbNBgLKcV9TbFqAvqIuhQREQEREBERAREQEREBERAREQEREBERAREQF4q0w4FrhIIgjiCvaIOVdo9nVMJV8AMfwybiowfwz/ADNmBOoUHBYc1iynSFnujKfgm58l1naOz6ddhp1WBzTu+4IuDzC1rs32RdhsS+q94e3LDDocx1cW6AxIsfTRU+NVeZNowOGFKmym3RrQB5LOiK6giIgIiICIiAiIgIiICIiAiIgIiICIiD//2Q==" alt="Username">
    <h1> Username </h1>
    <h4> admin@admin.com</h4>
    <h4>Bio:</h4>
    <p>Lorem ipsum ipsum lorem</p>
    <br class="custom-form">
        <input type="text" placeholder="Field name" value="Name" id="f_name">
        <select class="input-type">
            <option value="0">String</option>
            <option value="1">Integer</option>
            <option value="2">Boolean</option>
            <option value="3">Url</option>
            <option value="4">Array</option>
            <option value="5">Object</option>
        </select>
        <button class="btn-submit">Add</button>
        <button class="btn-generate">Gen json</button>
        </br>
        <textarea id="json"> </textarea>
        <div class="form-holder">

        </div>
    </div>
</div>
</template>
<script>
    export default{

    }
    $(document).ready(function() {
        var max_fields = 10;
        var wrapper = $(".form-holder");
        var add_button = $(".btn-submit");
        var genrate_button = $(".btn-generate");
        var text_form = $("#json");
        var x=1;
        $(genrate_button).click(function(e) {
            e.preventDefault();
            var attribures=[];
            var defaultValues=[];
            wrapper.children("div").children("label").children("input").get().forEach(e=>{
                arr.push(e.name)
            });

            console.log(arr);
            text_form.append( arr.join(','));
        });
        $(add_button).click(function(e) {
            var option = $(".input-type :selected"). val();
            var name = $("#f_name"). val();
            e.preventDefault();
            var type = undefined;
            var class_ = undefined;
            switch (option) {
                case "0":
                    type = 'text';
                    break;
                case "1":
                    type = "number";
                    break;
                case "2":
                    type = "checkbox";
                    break;
                case "3":
                    type = "url";
                    break;
                case "4":
                    type = "text";
                    break;
                case "5":
                    type = "text";
                    break;
            }
            var str = '<div><label for="'+x+'">'+name+'<input id="'+x+'" type="'+type+'" name="'+name+'" class="default-value"/>';

                str+='</label><a href="#" class="delete">X</a></div>'; //add input box
            x++;
            $(wrapper).append(str);

        });

        $(wrapper).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
        })
    });
</script>

