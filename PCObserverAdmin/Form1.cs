using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Threading;
using System.Net;
using System.IO;

namespace PCObserverAdmin
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }

        private void label1_Click(object sender, EventArgs e)
        {
            
        }

        private void tableLayoutPanel1_Paint(object sender, PaintEventArgs e)
        {

        }
        private bool isListenin = false;
        private void button1_Click(object sender, EventArgs e)
        {
            string mode = comboBox1.Text;
            string begin = "server begin! \n Welcome to PCObeserver! mode:" + mode + "\n";
            isListenin = !isListenin;
            button1.Text = isListenin ? "停止监听" : "开始监听";
            textBox1.AppendText(isListenin ? begin : "server stop!\n");
            if (isListenin)
            {
                string res = comboBox1.Text;
                //Console.WriteLine(res.CompareTo("白名单模式"));//黑1 白0
                if (res.CompareTo("白名单模式") == 1) res = "blacklist_mode";
                else res = "whitelist_mode";
                Console.WriteLine(res);
                HttpWebRequest request_config = (HttpWebRequest)WebRequest.Create("http://localhost:8000/config.php?mode="+res);
                HttpWebResponse response_config = (HttpWebResponse)request_config.GetResponse();
                HttpWebRequest request_admin = (HttpWebRequest)WebRequest.Create("http://localhost:8000/admin.php?mode="+res);
                HttpWebResponse response_admin = (HttpWebResponse)request_admin.GetResponse();
                Stream stream = response_admin.GetResponseStream();
                StringBuilder builder = new StringBuilder("\n");
                byte[] buffer = new byte[1024];
                int len;
                while ((len = stream.Read(buffer, 0, 1024)) != 0)
                {
                    builder.Append(Encoding.Default.GetString(buffer, 0, len));
                }
                stream.Close();
                textBox1.AppendText(builder.Append("\n").ToString());
            }
        }

        private void comboBox1_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void Form1_Load(object sender, EventArgs e)
        {
            this.comboBox1.Items.Add("黑名单模式");
            this.comboBox1.Items.Add("白名单模式");
            comboBox1.SelectedIndex = 0;
        }
    }
}
